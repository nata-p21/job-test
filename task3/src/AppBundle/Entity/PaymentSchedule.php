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
     * @ORM\Column(name="mainDebt", type="float")
     */
    private $mainDebt;

    /**
     * @var float
     *
     * @ORM\Column(name="interestRate", type="float")
     */
    private $interestRate;

    /**
     * @var float
     *
     * @ORM\Column(name="paymentSum", type="float")
     */
    private $paymentSum;

    /**
     * @var float
     *
     * @ORM\Column(name="balanceOfDebt", type="float")
     */
    private $balanceOfDebt;


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
     * Set mainDebt
     *
     * @param float $mainDebt
     *
     * @return paymentSchedule
     */
    public function setmainDebt($mainDebt)
    {
        $this->mainDebt = $mainDebt;

        return $this;
    }

    /**
     * Get mainDebt
     *
     * @return float
     */
    public function getmainDebt()
    {
        return $this->mainDebt;
    }

    /**
     * Set interestRate
     *
     * @param float $interestRate
     *
     * @return paymentSchedule
     */
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    /**
     * Get interestRate
     *
     * @return float
     */
    public function getInterestRate()
    {
        return $this->interestRate;
    }

    /**
     * Set paymentSum
     *
     * @param float $paymentSum
     *
     * @return paymentSchedule
     */
    public function setPaymentSum($paymentSum)
    {
        $this->paymentSum = $paymentSum;

        return $this;
    }

    /**
     * Get paymentSum
     *
     * @return float
     */
    public function getPaymentSum()
    {
        return $this->paymentSum;
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
}

