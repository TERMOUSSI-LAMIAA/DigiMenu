<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Abonnement;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'provider',
        'provider_id',
        'provider_token',
       
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


    public static function GenerateUsername($username)
    {
        if (empty($username)) {
            $username = Str::lower(Str::random(8));
        }
    
        if (User::where('username', $username)->exists()) {
            $newUsername = $username . Str::lower(Str::random(3));
            return self::GenerateUsername($newUsername);
        }
    
        return $username;
    }
    
   
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }

    public function abonnement() {
        return $this->belongsTo(Abonnement::class);
    }
}
