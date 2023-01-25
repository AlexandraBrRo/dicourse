<?php

namespace DiStudy\Validators;

use DiStudy\Interfaces\ValidatorInterface;

class CompositeValidator implements ValidatorInterface
{
    /**
     * @var array ValidatorInterface[]
     */

    private array $validators = [] ;

    public function __construct($validators)
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