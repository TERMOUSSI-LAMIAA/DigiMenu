<?php

namespace App\Models;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class restaurant extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
       'address',
      'opening_hr',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($restaurant) {
            $restaurant->menus->each->delete();
        });
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
