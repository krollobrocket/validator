<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class MinMax implements ValidatorInterface
{
    protected int $min;
    protected int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function validate($value): bool
    {
        return $value < $this->min || $value > $this->max ? false : true;
    }
}
