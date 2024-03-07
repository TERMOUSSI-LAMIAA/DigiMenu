<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Article;
use App\Models\User;
use App\Models\Abonnement;

class ClientController extends Controller
{
    public function getRestaurants(){
        $restaurants=Restaurant::all();
   
        return view("client.restaurants",compact("restaurants"));
    }
    public function getMenus($restaurant){
        // dd($restaurant);
        $menus=Menu::where('restaurant_id',$restaurant)->get();
        return view("client.menus",compact("menus"));
    }
    public function getArticles(Menu $menu){
        $articles=Article::where('menu_id',$menu->id)->get();
          $resto=Restaurant::find($menu->restaurant_id);
         return view("client.articles",compact("articles","resto"));
      

   
       
    }
}
