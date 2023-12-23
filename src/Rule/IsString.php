<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class IsString implements ValidatorInterface
{
    public function validate($value): bool
    {
        return is_string($value);
    }
}
