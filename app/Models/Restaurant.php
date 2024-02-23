<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($Restaurant) {
            $Restaurant->menus->each->delete();
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
