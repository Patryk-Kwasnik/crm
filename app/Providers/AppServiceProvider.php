<?php

namespace App\Providers;

use App\Repositories\CountryRepository;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\DocumentCategoryRepository;
use App\Repositories\DocumentCategoryRepositoryInterface;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\NewsCategoryRepositoryInterface;
use App\Repositories\OfferRepository;
use App\Repositories\OfferRepositoryInterface;
use App\Repositories\TaskCommentRepository;
use App\Repositories\TaskCommentRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Services\CountryService;
use App\Services\CountryServiceInterface;
use App\Services\CustomerService;
use App\Services\CustomerServiceInterface;
use App\Services\OfferService;
use App\Services\OfferServiceInterface;
use App\Services\OfferTemplateService;
use App\Services\OfferTemplateServiceInterface;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Repositories\NewsRepositoryInterface;
use App\Repositories\NewsRepository;
use App\Repositories\OfferTemplateRepository;
use App\Repositories\OfferTemplateRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/index';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
    public function register(): void
    {
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(NewsCategoryRepositoryInterface::class, NewsCategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(TaskCommentRepositoryInterface::class, TaskCommentRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
        $this->app->bind(DocumentCategoryRepositoryInterface::class, DocumentCategoryRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CountryServiceInterface::class, CountryService::class);
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
        $this->app->bind(OfferServiceInterface::class, OfferService::class);
        $this->app->bind(OfferTemplateRepositoryInterface::class, OfferTemplateRepository::class);
        $this->app->bind(OfferTemplateServiceInterface::class, OfferTemplateService::class);
    }
}
