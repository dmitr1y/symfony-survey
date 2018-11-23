<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTypes
 *
 * @ORM\Table(name="question_types")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionTypesRepository")
 */
class QuestionTypes
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
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var Questions
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Questions", mappedBy="type")
     */
    private $questionId;

    /**
     * @return Questions
     */
    public function getQuestionId(){
        return $this->questionId;
    }

    /**
     * @param $questionId
     * @return QuestionTypes
     */
    public function setQuestionid($questionId){
        $this->questionId=$questionId;
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
     * Set name
     *
     * @param string $name
     *
     * @return QuestionTypes
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
     * Set tag
     *
     * @param string $tag
     *
     * @return QuestionTypes
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionId
     *
     * @param \AppBundle\Entity\Questions $questionId
     *
     * @return QuestionTypes
     */
    public function addQuestionId(\AppBundle\Entity\Questions $questionId)
    {
        $this->questionId[] = $questionId;

        return $this;
    }

    /**
     * Remove questionId
     *
     * @param \AppBundle\Entity\Questions $questionId
     */
    public function removeQuestionId(\AppBundle\Entity\Questions $questionId)
    {
        $this->questionId->removeElement($questionId);
    }
}
