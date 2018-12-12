<?php

namespace App\Form;

use App\Entity\BlogArticle;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('headline')
            ->add('subhead')
            ->add('body', CKEditorType::class, [
                'config_name' => 'config_admin'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BlogArticle::class,
            'translation_domain' => 'admin'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_blog_article_admin';
    }
}
