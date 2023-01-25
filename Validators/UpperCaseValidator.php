<?php

namespace DiStudy\Validators;

use DiStudy\Interfaces\ValidatorInterface;

class UpperCaseValidator implements ValidatorInterface
{
    public function validate($value): bool
    {
        return preg_match('/[A-Z]/', $value);
    }
}