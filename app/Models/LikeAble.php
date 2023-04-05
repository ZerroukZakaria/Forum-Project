<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface LikeAble
{

    public function likes();

    public function likesRelation(): MorphMany;

    public function likeAbleSubject():string;

    public function dislikedBy(User $user);

    public function likedBy(User $user);

    public function isLikedBy(User $user): bool;
}
