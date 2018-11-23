<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PollType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('questions', CollectionType::class, [
                'entry_type' => new QuestionsType(),
                'entry_options' => [
                    'label' => 'Question',
                ],
//                'label'         => 'Add, move, remove values and press Submit.',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'required' => false,
                'prototype_name' => '__parent_name__',
                'attr' => [
                    'class' => 'test_questions',
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Poll'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_poll';
    }


}
