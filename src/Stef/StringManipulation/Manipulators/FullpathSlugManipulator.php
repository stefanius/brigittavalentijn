<?php

namespace Stef\StringManipulation\Manipulators;

class FullpathSlugManipulator extends AbstractManipulator{

    /**
     * @var AbstractManipulator
     */
    protected $slugManipulator;

    function __construct(AbstractManipulator $manipulator)
    {
        $this->slugManipulator = $manipulator;
    }

    protected function run($string)
    {
        $string = trim($string);
        $string = trim($string, '/');
        $parts = explode('/', $string);

        foreach ($parts as $key => $value) {
            $parts[$key] = $this->slugManipulator->manipulate($value);
        }

        return implode('/', $parts);
    }
} 