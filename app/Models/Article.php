<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
}
