<?php

namespace Stef\BVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('slug');
        $builder->add('bodytext');
    }

    public function getName()
    {
        return 'news';
    }
}