<?php

namespace Stef\GenerateFixturesBundle\Generator;

use Symfony\Component\Yaml\Yaml;

class YamlGenerator extends BaseGenerator
{
    protected function writeFixtureData()
    {
        $classname = sprintf('%s\\%s',
            $this->options->get('entity_namespace'),
            $this->options->get('entity_classname')
        );


       $this->fs->dumpFile($this->options->get('output_filename'),
           Yaml::dump([$classname => $this->fixtureData], 3, 2)
       );
       // var_dump(file_put_contents('test.txt', Yaml::dump([$classname => $this->fixtureData], 3, 2)));
    }
}
