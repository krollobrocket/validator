<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class AbsInt implements ValidatorInterface
{
    public function validate($value): bool
    {
        return preg_match('/^[0-9]+/', trim($value));
        // return filter_var($subject, FILTER_VALIDATE_INT) && $subject >= 0;
    }
}
