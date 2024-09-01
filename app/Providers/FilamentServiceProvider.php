<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerRenderHook(
                'styles.end',
                fn () => '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">'
            );

            Filament::registerRenderHook(
                'scripts.end',
                fn () => '<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>'
            );
        });

        // // Override Filament's authentication middleware for specific pages
        // $this->app['router']->get('/staff-directory', function() {
        //     return view('filament.pages.staff-directory', [
        //         'staff' => \App\Models\Staff::all()
        //     ]);
        // })->name('filament.pages.staff-directory')->withoutMiddleware(['auth']);
    }
}
