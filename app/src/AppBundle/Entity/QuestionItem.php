<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionItem
 *
 * @ORM\Table(name="question_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionItemRepository")
 */
class QuestionItem
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question", inversedBy="items")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(name="qi_order", type="integer")
     */
    private $qiOrder;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AnswerData", inversedBy="item")
     * @ORM\JoinColumn(nullable=true)
     */
    private $answer;

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
     * @return QuestionItem
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
     * Set questionId
     *
     * @param integer $question
     *
     * @return QuestionItem
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return int
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set qiOrder
     *
     * @param integer $qiOrder
     *
     * @return QuestionItem
     */
    public function setQiOrder($qiOrder)
    {
        $this->qiOrder = $qiOrder;

        return $this;
    }

    /**
     * Get qiOrder
     *
     * @return int
     */
    public function getQiOrder()
    {
        return $this->qiOrder;
    }
}

