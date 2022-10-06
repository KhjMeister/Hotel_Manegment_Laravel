<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useTailwind();
        $page_data = Page::where('id',1)->first();

        view()->share('global_page_data',$page_data);
    }
}
