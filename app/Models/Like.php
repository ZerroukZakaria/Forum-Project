<?php

namespace App\Models;

use App\Models\LikeAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;
    
    protected $table = 'likes';

    const TABLE = 'likes';

    protected $fillable = ['user_id'];


    public function likeAble()
    {
        return $this->likeAbleRelation;
    }

    public function likeAbleRelation(): MorphTo {
        return $this->morphTo('likeAbleRelation', 'likeable_type', 'likeable_id');
    }
}

