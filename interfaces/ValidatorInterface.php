<?php

namespace DiStudy\interfaces;

interface ValidatorInterface
{
    public function validate($value) : bool;
}