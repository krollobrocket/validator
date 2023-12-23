<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Lowercase implements ValidatorInterface
{
    public function validate($value): bool
    {
        return is_string($value) && preg_match('/[a-z]+/', $value);
    }
}
