<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Max implements ValidatorInterface
{
    protected int $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function validate($value): bool
    {
        switch (gettype($value)) {
            case 'string':
                return strlen($value) <= $this->max;
            case 'integer':
                return $value <= $this->max;
            case 'array':
                return count($value) <= $this->max;
        }
        return false;
    }
}
