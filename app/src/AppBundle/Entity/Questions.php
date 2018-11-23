<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionsRepository")
 */
class Questions
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
     * @var Poll
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poll", inversedBy="questions", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

    /**
     * @var QuestionTypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionTypes", inversedBy="questionId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ValidAnswer", mappedBy="question", cascade={"persist", "remove"})
     */
    private $validAnswer;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionItems", mappedBy="question", cascade={"persist", "remove"})
     */
    private $questionItems;

    public function __construct()
    {
        $this->questionItems = new ArrayCollection();
        $this->validAnswer = new ArrayCollection();
    }

    /**
     * Get question
     *
     * @return Poll
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set question
     *
     * @param Collection $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
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
     * Set type
     *
     * @param string $type
     *
     * @return Questions
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Questions
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
     * Set validAnswer
     *
     * @param Collection $validAnswer
     *
     * @return Questions
     */
    public function setValidAnswer($validAnswer)
    {
        $this->validAnswer = $validAnswer;

        return $this;
    }

    /**
     * Get validAnswer
     *
     * @return ArrayCollection
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
    }

    /**
     * Set questionItems
     *
     * @param ArrayCollection $questionItems
     *
     * @return Questions
     */
    public function setQuestionItems($questionItems)
    {
        $this->questionItems = $questionItems;

        return $this;
    }

    /**
     * Get questionItems
     *
     * @return ArrayCollection
     */
    public function getQuestionItems()
    {
        return $this->questionItems;
    }

    /**
     * Add validAnswer
     *
     * @param \AppBundle\Entity\ValidAnswer $validAnswer
     *
     * @return Questions
     */
    public function addValidAnswer(\AppBundle\Entity\ValidAnswer $validAnswer)
    {
        $this->validAnswer[] = $validAnswer;

        return $this;
    }

    /**
     * Remove validAnswer
     *
     * @param \AppBundle\Entity\ValidAnswer $validAnswer
     */
    public function removeValidAnswer(\AppBundle\Entity\ValidAnswer $validAnswer)
    {
        $this->validAnswer->removeElement($validAnswer);
    }

    /**
     * Add questionItem
     *
     * @param \AppBundle\Entity\QuestionItems $questionItem
     *
     * @return Questions
     */
    public function addQuestionItem(\AppBundle\Entity\QuestionItems $questionItem)
    {
        $this->questionItems[] = $questionItem;

        return $this;
    }

    /**
     * Remove questionItem
     *
     * @param \AppBundle\Entity\QuestionItems $questionItem
     */
    public function removeQuestionItem(\AppBundle\Entity\QuestionItems $questionItem)
    {
        $this->questionItems->removeElement($questionItem);
    }
}
