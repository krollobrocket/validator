<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class Alpha implements ValidatorInterface
{
    public function validate($value): bool
    {
        return (bool) filter_var($value, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[a-z\s]+$/i',
            ],
        ]);
    }
}
