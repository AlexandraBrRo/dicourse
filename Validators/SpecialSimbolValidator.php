<?php

namespace DiStudy\Validators;

use DiStudy\Interfaces\ValidatorInterface;

class SpecialSimbolValidator implements ValidatorInterface
{

    public function validate($value): bool
    {
        return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
    }
}