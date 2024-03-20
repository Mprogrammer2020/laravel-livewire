<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ["is_complete", "is_active", 'course_progress_percentage'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['is_active', 'is_complete'])->withTimestamps();
    }

    public function getIsCompleteAttribute()
    {
        return $this->users()->whereUserId(auth()->id())->wherePivot('is_complete', 1)->exists();
    }

    public function getisActiveAttribute()
    {
        return $this->users()->whereUserId(auth()->id())->wherePivot('is_active', 1)->exists();
    }

    public function getCourseProgressPercentageAttribute()
    {
        $markCompletedVideoByAuthuser = auth()->user()->videos()->whereIn('video_id', $this->course->videos()->pluck('id'))->wherePivot('is_complete', 1)->count();
        $totalVideoUnderCurrentCourse = $this->course->videos()->count();
        $progressPercentage = ($markCompletedVideoByAuthuser / $totalVideoUnderCurrentCourse) * 100;
        return (int)$progressPercentage;
    }
}
