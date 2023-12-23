<?php

namespace Cyclonecode\Validator\Rule;

use Cyclonecode\Validator\ValidatorInterface;

class ArrayHasKeys implements ValidatorInterface
{
    protected array $keys = [];

    public function __construct()
    {
        $this->keys = func_get_args();
    }

    public function validate($value): bool
    {
        return is_array($value) && !array_diff_key(array_flip($this->keys), $value);
    }
}
