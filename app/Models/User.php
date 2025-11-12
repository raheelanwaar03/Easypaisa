<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function trxIds()
    {
        return $this->hasOne(TrxID::class, 'user_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'balance',
        'level',
        'referral',
        'status',
        'package',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAccount10DaysOld(): bool
    {
        // Get the user's creation date (assuming the column name is "created_at")
        $createdAt = $this->created_at;

        // Calculate the difference in days using Carbon
        $differenceInDays = Carbon::now()->diffInDays($createdAt);

        // Check if the difference is greater than or equal to 15
        return $differenceInDays >= 10;
    }
}
