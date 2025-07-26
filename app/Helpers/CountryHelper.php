<?php

namespace App\Helpers;

use App\Services\CountryServiceInterface;

class CountryHelper
{
    public static function getNameById(int|string|null $id): ?string
    {
        return app(CountryServiceInterface::class)->getNameById($id);
    }

    public static function all(): array
    {
        return app(CountryServiceInterface::class)->all();
    }
}
