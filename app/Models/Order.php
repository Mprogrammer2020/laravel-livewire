<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    use HasFactory;

    protected $fillable = ['quantity', 'unit_price', 'plant_id', 'user_id', 'address', 'private_key', 'total_amount', 'currency', 'is_completed', 'order_number', 'expired_at'];

    public function plant() {
        return $this->hasOne(Plant::class, 'id', 'plant_id');
    }

    public function userDetail() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function affiliateCommission(){
        return $this->hasOne(AffiliateCommission::class,'order_id','id');
    }
}
