<?php

namespace DiStudy\Validators;

use DiStudy\interfaces\ValidatorInterface;

class SpecialSimbolValidator implements ValidatorInterface
{

    public function validate($value): bool
    {
        return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
    }
}