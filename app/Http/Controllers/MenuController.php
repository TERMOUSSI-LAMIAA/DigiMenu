<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::where('id',Auth::id())->first();
        $menus=Menu::where('restaurant_id', $user->restaurant_id)->get();
        return view('owner.menus',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.add_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        if ($user->restaurant_id) {
     
            $menu = Menu::create([
                'title' => $request->input('title'),
                'restaurant_id' => $user->restaurant_id,
            ]);   
        }
        return redirect()->route('menus.index')->with('success', 'Menu  added successfully');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
