<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Length implements ValidatorInterface
{
    protected int $maxLength;

    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }

    public function validate($value): bool
    {
        return strlen($value) <= $this->maxLength;
    }
}
