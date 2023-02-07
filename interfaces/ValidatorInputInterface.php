<?php

namespace DiStudy\interfaces;

interface ValidatorInputInterface
{
    public function validate($value) : bool;
}