<?php

namespace App\Form;

use App\Entity\Society;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('motto')
            ->add('emailPublic')
            ->add('emailForm')
            ->add('phoneMobile')
            ->add('phoneFixe')
            ->add('facebookLink')
            ->add('twitterLink')
            ->add('youtubeLink')
            ->add('instagramLink')
            ->add('githubLink')
            ->add('linkedinLink')
            ->add('address')
            ->add('zipcode')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Society::class,
        ]);
    }
}
