<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="valid_answer", type="string", length=255)
     */
    private $validAnswer;

    /**
     * @var string
     *
     * @ORM\Column(name="question_items", type="string", length=255)
     */
    private $questionItems;


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
     * @param string $validAnswer
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
     * @return string
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
    }

    /**
     * Set questionItems
     *
     * @param string $questionItems
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
     * @return string
     */
    public function getQuestionItems()
    {
        return $this->questionItems;
    }
}

