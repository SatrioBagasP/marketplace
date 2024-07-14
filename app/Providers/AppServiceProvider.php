<?php

namespace App\Providers;

use App\Models\User;
use App\Models\KeranjangModel;
use App\Models\TokoModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Agar variable notif dibawa ke semua view,
        View::composer('*', function ($view) {
            if (Auth::check()) { // cek apakah sudah login atau belum
                $notif = KeranjangModel::where('users_id', Auth::id())->count();
                $view->with('notif', $notif);
            }
        });

        Gate::define('shop', function (User $user) {
            return TokoModel::where('users_id', $user->id)->exists();
        });
        Gate::define('user', function (User $user) {
            return !TokoModel::where('users_id', $user->id)->exists();
        });
    }
}
