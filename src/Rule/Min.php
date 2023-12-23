<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Min implements ValidatorInterface
{
    protected int $min;

    public function __construct(int $min)
    {
        $this->min = $min;
    }

    public function validate($value): bool
    {
        // TODO: Could we use this on not only integers, e.g.
        //  count($subject)  >=  $this->min
        //  strlen($subject) >= $this->min
        return $value >= $this->min;
    }
}
