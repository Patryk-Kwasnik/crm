<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
class CountryRepository implements CountryRepositoryInterface
{
    public function getLocalizedList(string $locale): array
    {
        $table = "countries_{$locale}";
        return DB::table($table)
            ->select('code', "$table.name")
            ->orderBy("$table.name")
            ->pluck('name', 'code')
            ->toArray();
    }
}
