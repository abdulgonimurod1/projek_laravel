<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'role','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart(){
        return $this->hasMany(cart::class, 'user_id', 'id');
    }
    
    public function cart_detail(){
        return $this->hasMany(cart_detail::class, 'id', 'id');
    }

    public function bidding()
    {
        return $this->hasMany(bidding::class, 'kode_penawaran', 'id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($user) { // before delete() method call this
            $user->cart()->each(function($cart) {
                $cart->delete(); // <-- direct deletion
            });
            
            $user->cart_detail()->each(function($cart_detail) {
                $cart_detail->delete(); // <-- direct deletion
            });

            $user->bidding()->each(function($bidding) {
                $bidding->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
