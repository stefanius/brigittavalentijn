<?php

namespace Stef\BVBundle\Form;

use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('slug');
        $builder->add('bodytext');
        $builder->add('twig', 'text', ['data' => 'StefBVBundle:Page:default.html.twig']);
    }

    public function getName()
    {
        return 'page';
    }
}