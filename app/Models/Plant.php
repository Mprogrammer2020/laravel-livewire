<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "image1",
        "image2",
        "image3",
        "image4",
        "price",
        "thc",
        "cbd",
        "revenue_per_harvest",
        "annual_return",
        "description",
        "feature1",
        "feature2",
        "feature3",
        "benefit1",
        "benefit2",
        "benefit3",
        "earn_cash_text1",
        "earn_cash_text2",
        "earn_cash_text3",
        "what_you_get_text1",
        "what_you_get_text2",
        "what_you_get_text3",
        "harvest_per_year", "revenue", "quantity", "sell_price", "start_date", "end_date","eth_price"
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'plant_id','id');
    }
}