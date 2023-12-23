<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Email implements ValidatorInterface
{
    public function validate($value): bool
    {
        return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
