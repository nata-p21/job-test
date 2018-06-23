<?php

namespace AppBundle\Entity;

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
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var float
     *
     * @ORM\Column(name="interestRate", type="float")
     */
    private $interestRate;


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
     * Set sum
     *
     * @param float $sum
     *
     * @return CalculationHistory
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set period
     *
     * @param integer $period
     *
     * @return CalculationHistory
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return CalculationHistory
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set interestRate
     *
     * @param float $interestRate
     *
     * @return CalculationHistory
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
}

