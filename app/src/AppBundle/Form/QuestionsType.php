<?php

namespace AppBundle\Form;

use AppBundle\Entity\QuestionTypes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text')->add('type', EntityType::class,
            [
                'label' => 'Type',
                'class' => QuestionTypes::class,
                'property' => 'name',
            ])
            ->add('questionItems', CollectionType::class, [
                'entry_type' => QuestionItemsType::class,
                'entry_options' => array('label' => "-> Question item"),
                'allow_add' => true,
                'prototype_name' => '__children_name__',
                'allow_delete' => true,
                'prototype' => true,
                'required' => false,
                'attr' => [
                    'class' => 'questions_item',
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Questions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_questions';
    }


}
