<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class NotNull implements ValidatorInterface
{
    public function validate($value): bool
    {
        return !is_null($value);
    }
}
