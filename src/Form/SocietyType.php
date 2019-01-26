<?php

namespace App\Form;

use App\Entity\Society;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class SocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('motto')
            ->add('emailPublic', EmailType::class, [
                'required' => false
            ])
            ->add('emailForm', EmailType::class, [
                'required' => false
            ])
            ->add('phoneMobile', TelType::class, [
                'required' => false
            ])
            ->add('phoneFixe', TelType::class, [
                'required' => false
            ])
            ->add('facebookLink', UrlType::class, [
                'required' => false
            ])
            ->add('twitterLink', UrlType::class, [
                'required' => false
            ])
            ->add('youtubeLink', UrlType::class, [
                'required' => false
            ])
            ->add('instagramLink', UrlType::class, [
                'required' => false
            ])
            ->add('githubLink', UrlType::class, [
                'required' => false
            ])
            ->add('linkedinLink', UrlType::class, [
                'required' => false
            ])
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
