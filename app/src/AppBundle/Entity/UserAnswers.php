<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

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
     * @var Collection
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ValidAnswer", inversedBy="id")
     * @ORM\JoinColumn(name="valid_answer_id", referencedColumnName="id")
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
     * Get validAnswer
     *
     * @return ValidAnswer
     */
    public function getValidAnswer()
    {
        return $this->validAnswer;
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
     * Get userAnswer
     *
     * @return string
     */
    public function getUserAnswer()
    {
        return $this->userAnswer;
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
}
