<?php

namespace Stef\BVAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
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
    }

    public function getName()
    {
        return 'news';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
        ));
    }
}