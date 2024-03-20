<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsUserDashboard extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_title', 'description', 'video_link', 'video_thumbnail_image', 'description_step_1',
        'description_step_2',
        'description_step_3'
    ];

    public function cmsPage()
    {
        return $this->belongsTo(CmsPage::class);
    }
}
