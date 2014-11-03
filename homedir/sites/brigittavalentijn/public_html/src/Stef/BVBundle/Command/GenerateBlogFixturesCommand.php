<?php

namespace Stef\BVBundle\Command;

use Stef\GenerateFixturesBundle\Command\GenerateFixtureCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class GenerateBlogFixturesCommand extends GenerateFixtureCommand
{
    protected function configure() {
        $this->setName('stef:fixture:generate:bv-blog');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generatorSettings = new ParameterBag();
        $this->generatorSettings->set('entity_namespace', 'Stef\BVBundle\Entity');
        $this->generatorSettings->set('entity_classname', 'Blog');
        $this->generatorSettings->set('entity_bundle', 'StefBVBundle');

        $this->generate();
    }
}