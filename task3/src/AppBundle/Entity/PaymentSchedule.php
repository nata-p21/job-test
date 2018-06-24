<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paymentSchedule
 *
 * @ORM\Table(name="payment_schedule")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentScheduleRepository")
 */
class PaymentSchedule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="paymentNumber", type="integer")
     */
    private $paymentNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="monthlyCreditPayment", type="float")
     */
    private $monthlyCreditPayment;

    /**
     * @var float
     *
     * @ORM\Column(name="interestRatePayment", type="float")
     */
    private $interestRatePayment;

    /**
     * @var float
     *
     * @ORM\Column(name="monthlyPayment", type="float")
     */
    private $monthlyPayment;

    /**
     * @var float
     *
     * @ORM\Column(name="balanceOfDebt", type="float")
     */
    private $balanceOfDebt;

    /**
     * @var CalculationHistory
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CalculationHistory", inversedBy="paymentSchedule", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $calculationHistory;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set paymentNumber
     *
     * @param integer $paymentNumber
     *
     * @return paymentSchedule
     */
    public function setPaymentNumber($paymentNumber)
    {
        $this->paymentNumber = $paymentNumber;

        return $this;
    }

    /**
     * Get paymentNumber
     *
     * @return int
     */
    public function getPaymentNumber()
    {
        return $this->paymentNumber;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return paymentSchedule
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set monthlyCreditPayment
     *
     * @param float $monthlyCreditPayment
     *
     * @return paymentSchedule
     */
    public function setMonthlyCreditPayment($monthlyCreditPayment)
    {
        $this->monthlyCreditPayment = $monthlyCreditPayment;

        return $this;
    }

    /**
     * Get monthlyCreditPayment
     *
     * @return float
     */
    public function getMonthlyCreditPayment()
    {
        return $this->monthlyCreditPayment;
    }

    /**
     * Set interestRatePayment
     *
     * @param float $interestRatePayment
     *
     * @return paymentSchedule
     */
    public function setInterestRatePayment($interestRatePayment)
    {
        $this->interestRatePayment = $interestRatePayment;

        return $this;
    }

    /**
     * Get interestRatePayment
     *
     * @return float
     */
    public function getInterestRatePayment()
    {
        return $this->interestRatePayment;
    }

    /**
     * Set monthlyPayment
     *
     * @param float $monthlyPayment
     *
     * @return paymentSchedule
     */
    public function setMonthlyPayment($monthlyPayment)
    {
        $this->monthlyPayment = $monthlyPayment;

        return $this;
    }

    /**
     * Get monthlyPayment
     *
     * @return float
     */
    public function getMonthlyPayment()
    {
        return $this->monthlyPayment;
    }

    /**
     * Set balanceOfDebt
     *
     * @param float $balanceOfDebt
     *
     * @return paymentSchedule
     */
    public function setBalanceOfDebt($balanceOfDebt)
    {
        $this->balanceOfDebt = $balanceOfDebt;

        return $this;
    }

    /**
     * Get balanceOfDebt
     *
     * @return float
     */
    public function getBalanceOfDebt()
    {
        return $this->balanceOfDebt;
    }

    /**
     * Set calculationHistory
     *
     * @param CalculationHistory $calculationHistory
     *
     * @return PaymentSchedule
     */
    public function setCalculationHistory(CalculationHistory $calculationHistory = null)
    {
        $this->calculationHistory = $calculationHistory;

        return $this;
    }

    /**
     * Get calculationHistory
     *
     * @return CalculationHistory
     */
    public function getCalculationHistory()
    {
        return $this->calculationHistory;
    }

    public function getArray()
    {
        return [
            'paymentNumber' => $this->getPaymentNumber(),
            'date' => $this->getDate()->format('d.m.Y'),
            'monthlyCreditPayment' => $this->getMonthlyCreditPayment(),
            'interestRatePayment' => $this->getInterestRatePayment(),
            'monthlyPayment' => $this->getMonthlyPayment(),
            'debt' => $this->getBalanceOfDebt()
        ];
    }
}
