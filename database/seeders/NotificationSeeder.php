<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Notifications\NewReplyNotification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::all()->each(function(Reply $reply){
            $reply->replyAble()->author()->notifications()->create([
                'id' => Str::uuid()->toString(),
                'type' => NewReplyNotification::class,
                'data' => [
                    'type' => 'new_reply',
                    'reply' => $reply->id(),
                    'replyable_id' => $reply->replyable_id,
                    'replyable_type' => $reply->replyable_type,
                    'replyable_subject' => $reply->replyAble()->replyAbleSubject()


                ] ,
                'updated_at' => $reply->createdAt(),
                'created_at' => $reply->createdAt(),
            ]);
        });
    }
}
