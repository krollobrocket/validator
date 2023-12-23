<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class IsTrue implements ValidatorInterface
{
    public function validate($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true;
    }
}
