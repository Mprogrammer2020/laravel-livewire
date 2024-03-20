<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DesiredEffect;

class StrainOption extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "description",
        "desired_effect_id",
        "image"
    ];
    public function desiredEffect()
    {
        return $this->belongsTo(DesiredEffect::class);
    }

}
