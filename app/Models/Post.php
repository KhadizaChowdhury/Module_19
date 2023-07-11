<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'postImg',
    ];

    function user():BelongsTo{
        return $this->belongsTo(User::Class);
    }

    function category(): BelongsTo {
        return $this->belongsTo( Category::Class );
    }

    function comment():HasMany{
    return $this->hasMany( Comment::Class );
}
}
