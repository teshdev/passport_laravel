<?php

namespace App\Providers;

use App\Models\Contact;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Contact;

class ContactCountProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('contacts.index', function ($view) {
            $contactCount = Contact::count();
            $view->with('contactCount', $contactCount);
        });
    }
}
