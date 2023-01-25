<?php

namespace DiStudy\Validators;

class SpecialSimbolValidator implements \DiStudy\Interfaces\ValidatorInterface
{

    public function validate($value): bool
    {
        return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
    }
}