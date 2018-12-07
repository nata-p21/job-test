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

    public function getId(): int
    {
        return $this->id;
    }

    public function setPaymentNumber(int $paymentNumber): void
    {
        $this->paymentNumber = $paymentNumber;
    }

    public function getPaymentNumber(): int
    {
        return $this->paymentNumber;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setMonthlyCreditPayment(float $monthlyCreditPayment): void
    {
        $this->monthlyCreditPayment = $monthlyCreditPayment;
    }

    public function getMonthlyCreditPayment(): float
    {
        return $this->monthlyCreditPayment;
    }

    public function setInterestRatePayment(float $interestRatePayment): void
    {
        $this->interestRatePayment = $interestRatePayment;
    }

    public function getInterestRatePayment(): float
    {
        return $this->interestRatePayment;
    }

    public function setMonthlyPayment(float $monthlyPayment): void
    {
        $this->monthlyPayment = $monthlyPayment;
    }

    public function getMonthlyPayment(): float
    {
        return $this->monthlyPayment;
    }

    public function setBalanceOfDebt(float $balanceOfDebt)
    {
        $this->balanceOfDebt = $balanceOfDebt;
    }

    public function getBalanceOfDebt(): float
    {
        return $this->balanceOfDebt;
    }

    public function setCalculationHistory(CalculationHistory $calculationHistory = null): void
    {
        $this->calculationHistory = $calculationHistory;
    }

    public function getCalculationHistory(): CalculationHistory
    {
        return $this->calculationHistory;
    }

    public function getArray(): array
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
