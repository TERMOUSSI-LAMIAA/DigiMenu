<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($Menu) {
            $Menu->articles->each->delete();
        });
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function articles() {
        return $this->hasMany(Restaurant::class);
    }
}
