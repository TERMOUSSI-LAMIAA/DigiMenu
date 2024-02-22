<?php

namespace Database\Seeders;

use Psy\Util\Str;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Adminseeder extends Seeder
{
    protected $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $user= User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
      
        ]);
        $user->assignRole('Admin');

    }
}
