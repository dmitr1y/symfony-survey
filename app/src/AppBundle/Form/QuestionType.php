<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            ->add('qOrder')
            ->add('type', CollectionType::class, [
                'entry_type'   => QuestionTypeType::class,
            ])
            ->add('items', CollectionType::class, [
                'entry_type'   => QuestionItemType::class,
                'allow_add' => true,
            ])
            ->add('right_answers', CollectionType::class, [
                'entry_type'   => RightAnswerType::class,
                'allow_add' => true,
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
