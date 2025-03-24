<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('prenom', TextType::class, ['label' => 'Prénom'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('telephone', TextType::class, ['label' => 'Téléphone'])
            ->add('adresseFacturation', TextType::class, ['label' => 'Adresse de facturation'])
            ->add('adresseLivraison', TextType::class, ['label' => 'Adresse de livraison'])
            ->add('typeClient', ChoiceType::class, [
                'label' => 'Type de client',
                'choices' => [
                    'Particulier' => 'Particulier',
                    'Professionnel' => 'Professionnel'
                ],
                'required' => true,
                'attr' => ['onchange' => 'toggleSiretField()'] // Ajout d'une fonction JS pour montrer/cacher le champ SIRET
            ])
            
            ->add('numeroSiret', TextType::class, [
                'label' => 'Numéro SIRET (si Professionnel)',
                'required' => false,
                'attr' => ['class' => 'numero-siret-field', 'style' => 'display:none;'] // Caché par défaut
            ])
            ->add('Mots_De_Passe', PasswordType::class, [  // Modifié ici
                'label' => 'Mot de passe',
                'mapped' => false,  // Important de garder mapped => false pour le mot de passe
                'required' => true
            ])
            ->add('submit', SubmitType::class, ['label' => "S'inscrire"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
