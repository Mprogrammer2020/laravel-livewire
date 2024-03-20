<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $appends = ["create_human_readable", "read_more_activated"];
    protected $with = ['issueCategory'];
    use HasFactory;

    protected $fillable = [
        "subject",
        "description",
        "issue_category_id",
        "user_id",
        'status'
    ];

    public function issueCategory()
    {
        return $this->belongsTo(IssueCategory::class);
    }

    public function getReadMoreActivatedAttribute()
    {
        return false;
    }
    public function getCreateHumanReadableAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
