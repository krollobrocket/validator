<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class AlphaNumeric implements ValidatorInterface
{
    public function validate($value): bool
    {
        // TODO: extends Alpha rule?
        //  paret::validate($subject)
        //  filter_var($subject,  FILTER_VALIDATE_REGEXP, '/[0-9\s]+$/i')
        return (bool) filter_var($value, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[a-z0-9\s]+$/i',
            ],
        ]);
    }
}
