<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // // Using class based composers...
        // View::composer(
        //     'profile', 'App\Http\View\Composers\ProfileComposer'
        // );

        // // Using Closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });


        // PUBLIC

        View::composer(
            'master.head', 'App\Http\ViewComposers\HeadComposer'
        );

        View::composer(
            'master.header', 'App\Http\ViewComposers\HeaderComposer'
        );

        View::composer(
            'master.footer', 'App\Http\ViewComposers\FooterComposer'
        );


        // Usado para casos especificos donde el layout necesita saber si es admin o publico
        View::composer(
            'folder.layout.*', 'App\Http\ViewComposers\LayoutComposer'
        );




        // ADMIN

        View::composer(
            'admin.master.header', 'App\Http\ViewComposers\Admin\HeaderComposer'
        );

        View::composer(
            'admin.master.sidebar', 'App\Http\ViewComposers\Admin\SidebarComposer'
        );

        View::composer(
            'admin.master.component.standard', 'App\Http\ViewComposers\Admin\ComponentComposer'
        );

    }
}