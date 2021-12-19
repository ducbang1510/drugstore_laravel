<?php

namespace App\Providers;

use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
//use Illuminate\View\View;

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
        Paginator::useBootstrap();
        try {
            $categories = Category::all();
        } catch (QueryException $e) {
            dd('Query Exception'.$e->getMessage());
        } catch (\Exception $e) {
            dd('Exceptions'.$e->getMessage());
        }
        if(isset($categories)) {
            View::share('categories', $categories);
        }
    }
}
