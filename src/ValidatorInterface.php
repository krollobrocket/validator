<?php

namespace Cyclonecode\Validator;

interface ValidatorInterface
{
    public function validate($value): bool;
}
