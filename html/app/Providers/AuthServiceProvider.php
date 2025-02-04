<?php

namespace App\Providers;

use App\Models\Work;
use App\Policies\MyWork;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Work::class => MyWork::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-mywork', function ($user, $work) {
            return $user->id == $work->owner_id;
        });
    }
}
