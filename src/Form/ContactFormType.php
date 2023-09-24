<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control', // Ajoutez les classes CSS souhaitées
                ],
                'label' => 'Nom et prénom', // Ajoutez le label personnalisé ici
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control', // Ajoutez les classes CSS souhaitées
                ],
                'label' => 'Email', // Ajoutez le label personnalisé ici
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control', // Ajoutez les classes CSS souhaitées
                ],
                'label' => 'Objet', // Ajoutez le label personnalisé ici
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control', // Ajoutez les classes CSS souhaitées
                ],
                'label' => 'Message', // Ajoutez le label personnalisé ici
            ])
            ->add('acceptTerms', CheckboxType::class, [
                'required' => true,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
