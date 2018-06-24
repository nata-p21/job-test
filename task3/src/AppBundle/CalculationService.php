<?php
/**
 * Created by PhpStorm.
 * User: Nata
 * Date: 6/24/2018
 * Time: 1:02 PM
 */

namespace AppBundle;


use AppBundle\Entity\CalculationHistory;
use AppBundle\Entity\PaymentSchedule;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;

class CalculationService
{

    const ROUND = 7;

    private $em;
    /**
     * @var CalculationHistory
     */
    private $calculationData;
    /**
     * @var float
     */
    private $annuityCoefficient;
    /**
     * @var float
     */
    private $monthlyPayment;

    /**
     * @var float
     */
    private $monthlyInterestRate;

    /**
     * @var array
     */
    private $schedule;

    
    public function __construct(CalculationHistory $calculationData, EntityManager $em)
    {
        $this->calculationData = $calculationData;
        $this->em = $em;
        $this->schedule = new ArrayCollection();
    }

    public function setAnnuityCoefficient(): void
    {
        $period = $this->calculationData->getPeriod();
        $monthlyInterestRate = $this->monthlyInterestRate;

        $this->annuityCoefficient = round(($monthlyInterestRate*pow((1+$monthlyInterestRate),$period))/(pow((1+$monthlyInterestRate),$period)-1),
            self::ROUND);
    }


    public function setMonthlyInterestRate(): void
    {
        $interestRate = $this->calculationData->getInterestRate();
        $this->monthlyInterestRate = $interestRate/100/12;
    }


    public function setMonthlyPayment(): void
    {
        $this->monthlyPayment = round($this->annuityCoefficient*$this->calculationData->getSum(), self::ROUND);
    }

    public function calculate()
    {
        $this->setMonthlyInterestRate();
        $this->setAnnuityCoefficient();
        $this->setMonthlyPayment();
    }

    public function generatePaymentScheduleData()
    {
        $this->calculate();

        $date = $this->calculationData->getStartDate();
        $period = $this->calculationData->getPeriod();
        $debt = $this->calculationData->getSum();

        for ($i = 1; $i <= $period; $i++) {

            $paymentSchedule = new PaymentSchedule();

            $interestRatePayment = round($debt*$this->monthlyInterestRate, self::ROUND);
            $creditPayment = $this->monthlyPayment - $interestRatePayment;

            $paymentSchedule->setPaymentNumber($i);
            $paymentSchedule->setBalanceOfDebt($debt);
            $paymentSchedule->setDate($date);
            $paymentSchedule->setInterestRatePayment($interestRatePayment);
            $paymentSchedule->setMonthlyCreditPayment($creditPayment);
            $paymentSchedule->setMonthlyPayment($this->monthlyPayment);

            $paymentSchedule->setCalculationHistory($this->calculationData);

            $this->em->persist($paymentSchedule);
            $this->em->flush();

            $this->schedule->add($paymentSchedule->getArray());

            $debt = $debt - $creditPayment;
            $date = $date->modify('+1 month');

        }

    }

    public function getScheduleJson ()
    {
        return json_encode($this->schedule->toArray());
    }

}