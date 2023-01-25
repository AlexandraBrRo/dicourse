<?php

namespace DiStudy\Interfaces;

interface ValidatorInterface
{
    public function validate($value) : bool;
}