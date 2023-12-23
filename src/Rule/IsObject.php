<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class IsObject implements ValidatorInterface
{
    public function validate($value): bool
    {
        return is_object($value);
    }
}
