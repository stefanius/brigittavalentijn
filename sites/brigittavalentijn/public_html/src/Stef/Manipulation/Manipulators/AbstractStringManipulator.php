<?php

namespace Stef\Manipulation\Manipulators;

use Psr\Log\InvalidArgumentException;
use Stef\Manipulation\Interfaces\ManipulatorInterface;

abstract class AbstractStringManipulator implements ManipulatorInterface {
    public function manipulate($input)
    {
        if (!is_string($input)) {
            throw new InvalidArgumentException("Expected string");
        }

        return $this->run($input);
    }

    /**
     * @param $string
     * @return string
     */
    abstract protected function run($string);
} 