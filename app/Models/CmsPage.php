<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory;

    public function cmsUserDashboard()
    {
        return $this->hasOne(CmsUserDashboard::class);
    }

    public function affiliatedCenter()
    {
        return $this->hasOne(AffiliatedCenter::class);
    }
}
