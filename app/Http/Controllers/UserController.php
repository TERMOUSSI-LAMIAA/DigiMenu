<?php

namespace App\Http\Controllers;

use View;
use Rules\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
   

    public function GetOperators(){
        $operators = User::whereHas('roles', function ($query) {
            $query->where('name', 'operator');
       })->get();
    //    dd($Users);
        return view('Users.operators',compact('operators'));
    }

    
    public function GetOwnerOperators(){
        $owner=User::where('id',Auth::id())->first();
        $operators = User::where('restaurant_id',$owner->restaurant_id)->whereHas('roles', function ($query) {
            $query->where('name', 'operator');
       })->get();
    //    dd($Users);
        return view('Users.operators',compact('operators'));
    }
    public function Addoperator_own(){
        $owner=User::where('id',Auth::id())->first();
        return View('owner.add_op',compact('owner'));
    }
    public function Addoperator(){
        $restaurant=restaurant::all();
        return View('Users.create',compact('restaurant'));
    }
    public function OWNER(){
      $user = User::where('restaurant_id', '!=', null)
    ->where('id', Auth::id())
    ->whereHas('roles', function ($query) {
        $query->where('name', 'owner');
    })
    ->first();



    
        return view('dashboard_oner',compact('user'));
    }
   
    public function AddResturant(){
        
        return View('owner.create');
    }

    public function storeResturant(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'opening_hr' => 'required|date_format:H:i',
        ]);
       $resturant= restaurant::create([
            'name' =>$request->name, 
            'address' =>$request->address, 
            'opening_hr' =>$request->opening_hr, 
        ]);
        $user = User::where('id', Auth::id())
        ->whereHas('roles', function ($query) {
            $query->where('name', 'owner');
        })
        ->first();
        $user->restaurant_id=$resturant->id;
        $user->update();
        

        return redirect(route('dashboard_oner')); 
    }

    

    public function storeoperator(Request $request)
    {
        $molaction=User::where('id',Auth::id())->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'resturant' => 'required',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'restaurant_id' => $request->resturant,
            'email_verified_at' => now(),
        ]);
    
        $user->assignRole('operator');
    
    
        $this->sendEmail($user, $request->password);
    
      
          if( $molaction->HasRole('Admin')){
            return redirect(RouteServiceProvider::HOME);

          }else{
            return redirect(RouteServiceProvider::OWNER);

          }
    }
    
    private function sendEmail($user, $password)
    {
        $data = ['user' => $user, 'password' => $password];
    
        Mail::send('emails.operator_credentials', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your Operator Credentials');
        });
    }

    
}
