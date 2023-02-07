<?php

namespace DiStudy\inputValidators;

class NotEmpty implements \DiStudy\interfaces\ValidatorInputInterface
{

    public function validate($value): bool
    {
        return !empty($value);
    }
}