<?php

namespace Stef\BVAdminBundle\Form;

use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('slug');
        $builder->add('bodytext', 'ckeditor', array(
            'config' => array(
                'toolbar' => array(
                    array(
                        'name'  => 'basicitems',
                        'items' => array('Source'),
                    ),
                    array(
                        'name'  => 'basicstyles',
                        'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'),
                    ),
                ),
                'uiColor' => '#ffffff'
            )
        ));
        $builder->add('twig', 'text', ['data' => 'StefBVBundle:Page:default.html.twig']);
    }

    public function getName()
    {
        return 'page';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
        ));
    }
}