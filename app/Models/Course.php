<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ["completed_videos", "total_videos"];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function getCompletedVideosAttribute()
    {
        return auth()->user()->videos()->whereIn('video_id', $this->videos()->pluck('id'))->wherePivot('is_complete', 1)->count();
    }

    public function getTotalVideosAttribute()
    {
        return $this->videos()->count();
    }
}
