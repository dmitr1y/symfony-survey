<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Proxies\__CG__\AppBundle\Entity\Question;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * ValidAnswer
 *
 * @ORM\Table(name="valid_answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ValidAnswerRepository")
 */
class ValidAnswer
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
     * @var Collection
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Questions", inversedBy="validAnswer")
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
     * Set question
     *
     * @param Question $question
     *
     * @return ValidAnswer
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return ValidAnswer
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
}
