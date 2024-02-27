<?php

namespace App\Http\Controllers;

use App\Models\restaurant;
use Illuminate\Http\Request;

class welecomeController extends Controller
{
  public function index(){
    $restaurant=restaurant::all();

    return view('welcome',compact('restaurant'));
  }
}
