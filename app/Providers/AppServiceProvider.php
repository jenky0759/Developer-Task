<?php

namespace App\Providers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\ICustomerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICustomerRepository::class, function() {
            return new CustomerRepository(new Customer());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
