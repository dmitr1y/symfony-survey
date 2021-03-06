<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Proxies\__CG__\AppBundle\Entity\Question;

/**
 * QuestionItems
 *
 * @ORM\Table(name="question_items")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionItemsRepository")
 */
class QuestionItems
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
     * @var Questions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Questions", inversedBy="questionItems", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="questions_id", referencedColumnName="id")
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;


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
     * Get question
     *
     * @return Questions
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set question
     *
     * @param Question $question
     *
     * @return QuestionItems
     */
    public function setQuestion($question)
    {
        $this->question = $question;

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
     * Set text
     *
     * @param string $text
     *
     * @return QuestionItems
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
