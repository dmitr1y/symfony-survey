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
     * @var bool
     *
     * @ORM\Column(name="checkbox", type="boolean", nullable=true)
     */
    private $checkbox;

    /**
     * @var bool
     *
     * @ORM\Column(name="radio", type="boolean", nullable=true)
     */
    private $radio;

    /**
     * @var bool
     *
     * @ORM\Column(name="text", type="boolean", nullable=true)
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
     * Set checkbox
     *
     * @param boolean $checkbox
     *
     * @return QuestionTypes
     */
    public function setCheckbox($checkbox)
    {
        $this->checkbox = $checkbox;

        return $this;
    }

    /**
     * Get checkbox
     *
     * @return bool
     */
    public function getCheckbox()
    {
        return $this->checkbox;
    }

    /**
     * Set radio
     *
     * @param boolean $radio
     *
     * @return QuestionTypes
     */
    public function setRadio($radio)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return bool
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Set text
     *
     * @param boolean $text
     *
     * @return QuestionTypes
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return bool
     */
    public function getText()
    {
        return $this->text;
    }
}

