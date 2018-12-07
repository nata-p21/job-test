<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CalculationHistory
 *
 * @ORM\Table(name="calculation_history")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CalculationHistoryRepository")
 */
class CalculationHistory
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
     * @var float
     *
     * @ORM\Column(name="sum", type="float")
     */
    private $sum;

    /**
     * @var int
     *
     * @ORM\Column(name="period", type="integer")
     */
    private $period;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var float
     *
     * @ORM\Column(name="interestRate", type="float")
     */
    private $interestRate;

    /**
     * @var PaymentSchedule[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PaymentSchedule", mappedBy="calculationHistory")
     *
     */
    private $paymentSchedule;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $calculationDate;

    public function __construct()
    {
        $this->paymentSchedule = new ArrayCollection();
        $this->calculationDate = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function setPeriod(int $period): void
    {
        $this->period = $period;
    }

    public function getPeriod(): int
    {
        return $this->period;
    }

    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = new \DateTime($startDate);
    }

    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    public function setInterestRate(float $interestRate): void
    {
        $this->interestRate = $interestRate;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function addPaymentSchedule(PaymentSchedule $paymentSchedule): void
    {
        $this->paymentSchedule[] = $paymentSchedule;
    }

    public function removePaymentSchedule(PaymentSchedule $paymentSchedule): void
    {
        $this->paymentSchedule->removeElement($paymentSchedule);
    }

    /**
     * @return PaymentSchedule[]|ArrayCollection|null
     */
    public function getPaymentSchedule()
    {
        return $this->paymentSchedule;
    }
}
