<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StrainOption;

class DesiredEffect extends Model
{
    use HasFactory;
    protected $appends=['selected'];

    protected $fillable=[
        "name",
        "description"
    ];
    public function getSelectedAttribute()
    {
        return false;
    }

    public function strainOptions()
    {
        return $this->hasmany(StrainOption::class);
    }
}
