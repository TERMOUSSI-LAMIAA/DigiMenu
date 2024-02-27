<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Article;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::where('id',Auth::id())->first();
        $menus = Menu::where('restaurant_id', $user->restaurant_id)->pluck('id');

        $articles = Article::whereIn('menu_id', $menus)->get();
        return view('owner.articles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("owner.add_article");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'description'=>'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Article::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'img' => $request->file('image')->store('imgs', 'public'),
             
                
            ]);
      
        return redirect()->route('Articles.index')->with('success', 'article added successfully');  
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
