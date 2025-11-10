<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Customer;
use App\Repositories\ContactRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\IContactRepository;
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

        $this->app->bind(IContactRepository::class, function() {
            return new ContactRepository(new Contact());
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
