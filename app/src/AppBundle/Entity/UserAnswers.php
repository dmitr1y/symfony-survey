<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAnswers
 *
 * @ORM\Table(name="user_answers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserAnswersRepository")
 */
class UserAnswers
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ValidAnswer", inversedBy="id")
     */
    private $validAnswer;

    /**
     * @var string
     *
     * @ORM\Column(name="user_answer", type="string", length=255)
     */
    private $userAnswer;


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
     * Set validAnswer
     *
     * @param ValidAnswer $validAnswer
     *
     * @return UserAnswers
     */
    public function setValidAnswer($validAnswer)
    {
        $this->validAnswer = $validAnswer;

        return $this;
    }

    /**
     * Get validAnswer
     *
     * @return ValidAnswer
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
    }

    /**
     * Set userAnswer
     *
     * @param string $userAnswer
     *
     * @return UserAnswers
     */
    public function setUserAnswer($userAnswer)
    {
        $this->userAnswer = $userAnswer;

        return $this;
    }

    /**
     * Get userAnswer
     *
     * @return string
     */
    public function getUserAnswer()
    {
        return $this->userAnswer;
    }
}
