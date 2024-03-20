<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $appends = ["create_human_readable"];
    protected $with = ['user'];

    protected $fillable = [
        'comment', 'user_id', 'post_id'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreateHumanReadableAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
