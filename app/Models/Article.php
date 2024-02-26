<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
