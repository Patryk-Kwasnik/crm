<?php

namespace App\Repositories;

interface CountryRepositoryInterface
{
    public function getLocalizedList(string $locale): array;
}
