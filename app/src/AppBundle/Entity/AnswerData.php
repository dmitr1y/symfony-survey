<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerData
 *
 * @ORM\Table(name="answer_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerDataRepository")
 */
class AnswerData
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Answer", inversedBy="answer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $answer;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RightAnswer", inversedBy="answer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rightAnswer;
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionItem", mappedBy="")
     */
    private $item;


    public function __construct()
    {
        $this->item = new ArrayCollection();
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
     * Set questionId
     *
     * @param integer $answer
     *
     * @return AnswerData
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return int
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return AnswerData
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set item
     *
     * @param string $item
     *
     * @return AnswerData
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }
}

