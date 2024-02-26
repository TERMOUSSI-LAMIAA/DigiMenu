<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Abonnement extends Model
{
    use HasFactory;


    protected $fillable=[
        'type',
'start_date',
'nbr_article',
'type_media',
'nbr_scan',
    ];
    protected $table='abonnement';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($Abonnement) {
            $Abonnement->users->each->delete();
        });
    }
    
    public function users() {
        return $this->hasMany(User::class);
    }
}
