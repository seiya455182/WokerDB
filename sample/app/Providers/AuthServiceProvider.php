<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 権限管理者のみ許可
    Gate::define('all-permission', function ($user) {
      return ($user->permission == 1);
    });
    // 編集可能以上に許可
    Gate::define('edit-permission', function ($user) {
      return ($user->permission > 0 && $user->permission <= 5);
    });
    // 全権限に許可
    Gate::define('browse-permission', function ($user) {
      return ($user->permission > 0 && $user->permission <= 10);
    });
    }
}
