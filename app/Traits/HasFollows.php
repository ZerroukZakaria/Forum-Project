<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Session;

trait HasFollows
{

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function followers()
    {
        return $this->followerRelation;
    }

    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')
            ->withTimestamps();
    }

    public function followerRelation(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')
            ->withTimestamps();
    }

    public function toggleFollow(User $user)
    {

        if ($this->isFollowing($user)) {
            Session::flash('success', "You unfollowed $user->name");
            return $this->unfollow($user);
        }

        Session::flash('success', "You followed $user->name");
        return $this->follow($user);
    }


    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id())->exists();
    }
}
