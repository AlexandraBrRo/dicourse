<?php

namespace DiStudy\interfaces;

interface PostcodeInterface
{
    public function getByPostcode(string $postcode): array;
}