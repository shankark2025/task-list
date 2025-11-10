<?php

namespace App\Providers;

use App\View\Composers\ShortcutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\ProfileComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Whenever 'profile' view is loaded, run ProfileComposer
        View::composer('profile', ProfileComposer::class);
        View::composer(
            ['welcomeOne', 'dashboard', 'profile'], // array of views
            ShortcutComposer::class
        );



    }
}
