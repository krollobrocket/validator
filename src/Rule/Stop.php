<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Stop implements ValidatorInterface
{
    public function validate($value): bool
    {
        return true;
    }
}
