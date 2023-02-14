<?php

namespace DiStudy\Validators;

use DiStudy\interfaces\ValidatorInterface;

class CompositeValidator implements ValidatorInterface
{
    /**
     * @var array ValidatorInterface[]
     */

    protected array $validators = [];

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