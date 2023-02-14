<?php

namespace DiStudy\inputValidators;

class NumberCountValidator implements \DiStudy\interfaces\ValidatorInputInterface
{
    private $number;
    private $ruls;

    public function __construct($numberOfCount, bool $rule = true){
        $this->number = $numberOfCount;
        $this->ruls = $rule;
    }

    public function validate($value): bool
    {
        if($this->ruls){
            return strlen($value) === $this->number;
        }
        return strlen($value) <= $this->number;
    }
}