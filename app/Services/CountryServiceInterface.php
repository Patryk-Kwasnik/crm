<?php

namespace App\Services;

interface CountryServiceInterface
{
    public function all(): array;
    public function getNameById(int|string|null $id): ?string;
}

