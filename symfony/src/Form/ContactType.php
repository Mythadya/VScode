<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Champ Email
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse e-mail',
            ])
            // Champ Nom
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
            ])
            // Champ Sujet
            ->add('subject', TextType::class, [
                'label' => 'Sujet de votre message',
            ])
            // Champ Choix du Sujet (avec des options prédéfinies)
            ->add('topic', ChoiceType::class, [
                'label' => 'Choisissez un sujet',
                'choices' => [
                    'Demande d\'information' => 'information',
                    'Problème technique' => 'technical_issue',
                    'Autre' => 'other',
                ],
            ])
            // Champ Message
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
