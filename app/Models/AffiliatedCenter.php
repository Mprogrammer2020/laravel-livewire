<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatedCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'cms_page_id',
        'video_thumbnail_image',
        'video_link',
        'tracking_title',
        'tracking_link',
        'step1_content',
        'step2_content',
        'step3_content',
    ];

    public function cmsPage()
    {
        return $this->belongsTo(CmsPage::class);
    }
}
