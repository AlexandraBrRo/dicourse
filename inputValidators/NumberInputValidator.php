<?php

namespace DiStudy\inputValidators;

class NumberInputValidator implements \DiStudy\interfaces\ValidatorInputInterface
{

    public function validate($value): bool
    {
        return is_numeric($value);
    }
}