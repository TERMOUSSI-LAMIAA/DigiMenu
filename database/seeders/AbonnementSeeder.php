<?php

namespace Database\Seeders;

use App\Models\Abonnement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abonnement::create([
            'type'=>'Plan Gratuit',
            'nbr_article'=>10,
            'type_media'=>'image',
            'nbr_scan'=>5,
           ]);

           Abonnement::create([
            'type'=>'Plan Standard',
            'nbr_article'=>10,
            'type_media'=>'video',
            'nbr_scan'=>6,
           ]);

           Abonnement::create([
            'type'=>'Plan Premium',
            'nbr_article'=>10,
            'type_media'=>'video',
            'nbr_scan'=>7,
           ]);
    }
}
