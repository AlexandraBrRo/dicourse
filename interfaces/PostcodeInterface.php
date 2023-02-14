<?php

namespace DiStudy\interfaces;

interface PostcodeInterface
{
    public function getByPostcode(string $postcode): array;
    public function getAllPostcode(): array;
    public function setNewPostcode(string $postcode, $bestEta, $worstEta): string;

}

