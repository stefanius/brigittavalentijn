<?php

namespace Stef\StringManipulation\Manipulators;

use Psr\Log\InvalidArgumentException;
use Stef\StringManipulation\Interfaces\ManipulatorInterface;

abstract class AbstractManipulator implements ManipulatorInterface {
    public function manipulate($string)
    {
        if (!is_string($string)) {
            throw new InvalidArgumentException("Expected string");
        }

        return $this->run($string);
    }

    /**
     * @param $string
     * @return string
     */
    abstract protected function run($string);
} 