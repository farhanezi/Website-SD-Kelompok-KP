<?php

namespace App\Providers;

use App\Models\Pesan;
use Illuminate\Support\Facades\Schema;
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
        // Bagikan jumlah pesan belum dibaca ke layout & sidebar admin (badge notifikasi).
        View::composer(['layouts.admin', 'admin.partials.sidebar'], function ($view) {
            $unread = (auth()->check() && Schema::hasTable('pesan'))
                ? Pesan::where('is_read', false)->count()
                : 0;

            $view->with('unreadPesan', $unread);
        });
    }
}
