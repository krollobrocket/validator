<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class IsArray implements ValidatorInterface
{
    public function validate($value): bool
    {
        return is_array($value);
    }
}
