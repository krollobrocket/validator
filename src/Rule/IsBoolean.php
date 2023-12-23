<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class IsBoolean implements ValidatorInterface
{
    public function validate($value): bool
    {
        return is_bool($value);
    }
}
