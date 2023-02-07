<?php

namespace DiStudy\Validators;

use DiStudy\interfaces\ValidatorInterface;

class UpperCaseValidator implements ValidatorInterface
{
    public function validate($value): bool
    {
        return preg_match('/[A-Z]/', $value);
    }
}