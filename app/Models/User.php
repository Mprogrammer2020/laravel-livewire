<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\StrainBase;
use App\Models\DesiredEffect;
use App\Models\StrainOption;
use Hashids\Hashids;

class User extends Authenticatable {

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birthdate',
        'business_name',
        'referrer_id',
        'street',
        'house_number',
        'address',
        'zip_code',
        'city',
        'country',
        'state',
        'harvest_progress',
        'affiliate_commission',
        'hash_token',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'role_name',
        'tracking_link'
            // 'profile_photo_url',
    ];

    public function strainBase() {
        return $this->belongsTo(StrainBase::class);
    }

    public function strainOption() {
        return $this->belongsTo(StrainOption::class);
    }

    public function desiredEffects() {
        return $this->belongsToMany(DesiredEffect::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function getRoleNameAttribute() {
        if ($this->roles()->exists())
            return $this->roles()->first()->name;
        else
            return 0;
    }

    public function referrer() {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function referrals() {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    public function getTrackingLinkAttribute() {
        $hashids = new Hashids();
        return env('APP_URL') . '/user/register/' . $hashids->encode($this->id);
    }

    public function videos() {
        return $this->belongsToMany(Video::class)->withPivot(['is_active', 'is_complete'])->withTimestamps();
    }

    public function plants() {
        return $this->belongsToMany(Plant::class)->withPivot(['quantity', 'total_amount'])->withTimestamps();
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function isShippingAddressAvailable() {
        return ($this->street &&
                $this->house_number &&
                $this->address &&
                $this->zip_code &&
                $this->city &&
                $this->country &&
                $this->state);
    }

    /**
     * affiliate commission for the user collection object
     * @return type
     */
    public function affiliateCommissions() {
        return $this->hasMany(AffiliateCommission::class, 'user_id', 'id');
    }

}
