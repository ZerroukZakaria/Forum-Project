<?php

namespace App\Models;

use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasTimestamps;


    const TABLE = 'categories';

    protected $table = self::TABLE;

    protected $fillable = ['name', 'slug'];


    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }


    public function slug(): string
    {
        return $this->slug;
    }
}
