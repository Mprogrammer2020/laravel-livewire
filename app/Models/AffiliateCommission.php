<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model {

    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'commission_amount', 'status'
    ];

    /**
     * get user detail from current user collection object
     * @return type
     */
    public function userDetail() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * get order detail from current collection object
     * @return type
     */
    public function orderDetail() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
