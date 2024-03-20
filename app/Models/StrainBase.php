<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrainBase extends Model
{
    use HasFactory;

    protected $fillable=[
                "name",
                "short_description",
                "origin",
                "effects_of_use",
                "plant_description",
                "recommended_timings",
                "cbd_to_thc_ratio",
                "popular_strains",
                "image"
    ];
}
