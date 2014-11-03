<?php

namespace Stef\BVBundle\Command;

use Stef\GenerateFixturesBundle\Command\GenerateFixtureCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class GenerateNewsFixturesCommand extends GenerateFixtureCommand
{
    protected function configure() {
        $this->setName('stef:fixture:generate:bv-news');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generatorSettings = new ParameterBag();
        $this->generatorSettings->set('entity_namespace', 'Stef\BVBundle\Entity');
        $this->generatorSettings->set('entity_classname', 'News');
        $this->generatorSettings->set('entity_bundle', 'StefBVBundle');

        $this->generate();
    }
}