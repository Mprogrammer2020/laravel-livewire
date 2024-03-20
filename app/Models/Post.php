<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $appends = ["create_human_readable", "read_more_activated", "comment_count"];
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreateHumanReadableAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getImageAttribute($image)
    {
        return asset("storage/{$image}");
    }

    public function getCommentCountAttribute()
    {
        return $this->comments()->count();
    }

    public function getReadMoreActivatedAttribute()
    {
        return false;
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
