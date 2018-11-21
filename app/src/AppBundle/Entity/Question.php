<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionType", inversedBy="questions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;



    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test", inversedBy="questions")
     */
    private $test;

    /**
     * @var int
     *
     * @ORM\Column(name="q_order", type="integer")
     */
    private $qOrder;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionItem", mappedBy="question")
     */
    private $items;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RightAnswer", mappedBy="question")
     */
    private $rightAnswer;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Answer", mappedBy="question")
     */
    private $answers;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->rightAnswer = new ArrayCollection();
        $this->answers = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Question
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set testId
     *
     * @param integer $test
     *
     * @return Question
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get testId
     *
     * @return int
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set qOrder
     *
     * @param integer $qOrder
     *
     * @return Question
     */
    public function setQOrder($qOrder)
    {
        $this->qOrder = $qOrder;

        return $this;
    }

    /**
     * Get qOrder
     *
     * @return int
     */
    public function getQOrder()
    {
        return $this->qOrder;
    }
}

