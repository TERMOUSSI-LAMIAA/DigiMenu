<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
   
    use HasFactory, InteractsWithMedia;
    
    protected $table='article';
    protected $fillable = ['title', 'description', 'price', 'menu_id','categorie_id'];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
}
