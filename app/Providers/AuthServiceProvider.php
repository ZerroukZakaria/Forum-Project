<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use App\Policies\NotificationPolicy;
use App\Policies\UserPolicy;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Thread::class => ThreadPolicy::class,
        Reply::class => ReplyPolicy::class,
        DatabaseNotification::class => NotificationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
