<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Gates\AdminGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // //Gate define via Closer Function
        // Gate::define("isAdmin",function($user){
        //     if($user->email === "admin@gmail.com") {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // });

        //Gate define via AdminGate Class check_admin Function
        Gate::define("isAdmin",[AdminGate::class,"check_admin"]);
    }
}
