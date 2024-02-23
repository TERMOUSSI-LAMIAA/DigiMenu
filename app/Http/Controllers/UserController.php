<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function GetUsers(){
        $Users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
       })->get();
    //    dd($Users);
        return view('Users.Users',compact('Users'));
    }

    public function GetOperators(){
        $operators = User::whereHas('roles', function ($query) {
            $query->where('name', 'operator');
       })->get();
    //    dd($Users);
        return view('Users.operators',compact('operators'));
    }
    public function asignOperator(User $item){
        $item->assignRole('operator');
        
        return redirect(route('Users.GetUsers'));
    }
    
}
