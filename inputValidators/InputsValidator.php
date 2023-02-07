<?php

namespace DiStudy\inputValidators;

use DiStudy\interfaces\ValidatorInputInterface;

class InputsValidator implements ValidatorInputInterface
{
    /**
     * @var array ValidatorInputInterface[]
     */

    private array $validators = [];

    public function __construct(array $validators)
    {
        $this->validators = $validators;
    }

    public function validate($value): bool
    {
        foreach ($this->validators as $validator){
            if(!$validator->validate($value)){
                return false;
            }
        }

        return true;
    }
}