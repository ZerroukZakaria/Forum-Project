<?php

namespace App\Providers;

use App\Events\PostWasLiked;
use App\Events\ReplyWasCreated;
use App\Events\ReplyWasDeleted;
use App\Events\ThreadWasCreated;
use App\Events\ThreadWasDeleted;
use App\Listeners\AwardPointsForCreatingReply;
use App\Listeners\AwardPointsForCreatingThread;
use App\Listeners\RemovePointsForDeletingReply;
use App\Listeners\RemovePointsForDeletingThread;
use App\Listeners\sendNewLikeNotification;
use Illuminate\Auth\Events\Registered;
use App\Listeners\sendNewReplyNotification;
use App\Listeners\sendNewThreadNotifiaction;
use App\Models\Reply;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
   
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ReplyWasCreated::class => [
            sendNewReplyNotification::class,
            AwardPointsForCreatingReply::class,
        ],
        ThreadWasCreated::class => [
            sendNewThreadNotifiaction::class,
            AwardPointsForCreatingThread::class,
        ],

        PostWasLiked::class => [
            sendNewLikeNotification::class
        ],
        ReplyWasDeleted::class => [
            RemovePointsForDeletingReply::class,
        ],

        ThreadWasDeleted::class => [
            RemovePointsForDeletingThread::class
        ],
        
    ];

   
    public function boot()
    {
        //
    }
}
