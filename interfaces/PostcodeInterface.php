<?php

namespace DiStudy\interfaces;

interface PostcodeInterface
{
    public function getByPostcode(string $postcode): array;
    public function getAllPostcode(string $postcode): array;
    public function set(string $postcode, $besteta, $worsteta): array;

}