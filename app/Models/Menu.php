<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $table='menu';
    //*added
    protected $fillable = ['title', 'restaurant_id'];
    //*
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
        return $this->hasMany(Article::class);
    }
}
