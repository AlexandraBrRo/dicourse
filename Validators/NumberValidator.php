<?php

namespace DiStudy\Validators;

use DiStudy\interfaces\ValidatorInterface;

class NumberValidator implements ValidatorInterface
{

    public function validate($value): bool
    {
        return preg_match('~[0-9]~', $value);
    }
}





