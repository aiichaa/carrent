<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VehicleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', EntityType::class, array(
                'class' => 'AppBundle:Model',
                'choice_label' => function ($modele) {
                    return $modele->getName();
                },
                'label' => "Modèle"))
            ->add('registrationNumber', TextType::class, [
                'label'=> 'Matricule'
            ])
            ->add('color', ColorType::class, [
                'label'=> 'Couleur'
            ])
            ->add('price', NumberType::class, [
                'label'=> 'Prix'
            ])
            ->add('description', TextareaType::class, [
                'label'=> 'Déscription'
            ])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vehicle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vehicle';
    }


}
