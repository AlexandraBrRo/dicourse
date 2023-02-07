<?php

namespace DiStudy\inputValidators;

class NumberCountValidator implements \DiStudy\interfaces\ValidatorInputInterface
{

    public function validate($value): bool
    {
        return strlen($value) === 4;
    }
}