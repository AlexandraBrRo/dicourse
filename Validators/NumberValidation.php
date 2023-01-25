<?php

namespace DiStudy\Validators;

class NumberValidation implements \DiStudy\Interfaces\ValidatorInterface
{

    public function validate($value): bool
    {
        return preg_match('~[0-9]~', $value);
    }
}