<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('qOrder', IntegerType::class, [
                'attr' => [
                    'readonly' => true,
                    'class' => 'question-position',
                    'autocomplete' => 'off',
                    'hidden' =>true,
                ]
            ])
            ->add('type', CollectionType::class, [
                'entry_type'   => QuestionTypeType::class,
            ])
            ->add('answer', CollectionType::class, [
                'entry_type'   => QuestionItemType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'label' => 'Question item',
                'prototype_name' => '__parent_name__',
                'attr' => array(
                    'class' => 'question_items',
                ),
            ])
            ->add('right_answers', CollectionType::class, [
                'entry_type'   => RightAnswerType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'attr' => array(
                    'class' => 'right_answer',
                ),
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_question';
    }


}
