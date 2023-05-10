<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
                   //Admin est le nom de l'autorisation pour la facade gate
                    Gate::define('admin', function (User $user) {
                    //colonne utilisateur retourne un boolean
                    return $user->admin === 1;
                });

                //User est le nom de l'autorisation pour la facade gate
                    Gate::define('user', function (User $user) {
                    //colonne utilisateur retourne un boolean
                    return $user->user === 1;
                });
    }
}
