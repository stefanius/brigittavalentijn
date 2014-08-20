<?php

namespace Stef\GenerateFixturesBundle\Command;

use Doctrine\Common\Util\Inflector;
use Doctrine\ORM\Query;
use JMS\Serializer\SerializationContext;
use Stef\GenerateFixturesBundle\BagValidator\GeneratorBagValidator;
use Stef\GenerateFixturesBundle\Generator\YamlGenerator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Yaml\Yaml;

abstract class AbstractGenerateFixtureCommand extends BaseCommand
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $today = new \DateTime('now');

        $doctrine = $this->getDoctrine();
        $serializer = $this->getJmsSerializer();
        $fs = $this->getFilesystem();

        $options = new ParameterBag();
        $options->set('entity_namespace', 'Stef\BVBundle\Entity');
        $options->set('entity_classname', 'Blog');
        $options->set('entity_bundle', 'StefBVBundle');
        $options->set('output_filename', sprintf('yaml-fixture-%s-%s.yml',
            $today->format('Y-m-d'),
            $options->get('entity_classname')
        ));

        $generator = new YamlGenerator($doctrine, $serializer, $fs, $options, new GeneratorBagValidator());

        $generator->execute();
    }
}