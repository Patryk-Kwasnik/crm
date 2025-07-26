<?php

namespace App\Services;

use App\Models\Country;
use App\Repositories\CountryRepository;
use App\Repositories\CountryRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class CountryService implements CountryServiceInterface
{
    public function __construct(
        private readonly CountryRepositoryInterface $repository
    ) {}

    public function all(): array
    {
        $locale = app()->getLocale();
        return Cache::rememberForever("countries_list_{$locale}", function () use ($locale) {
            return $this->repository->getLocalizedList($locale);
        });
    }

    public function getNameById(int|string|null $id): ?string
    {
        $countries = $this->all();
        return $countries[$id] ?? null;
    }

    public static function clearCache(): void
    {
        $locale = app()->getLocale();
        Cache::forget("countries_list_{$locale}");
    }
}
