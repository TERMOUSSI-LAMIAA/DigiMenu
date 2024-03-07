<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class abonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abonnement=Abonnement::all();
        return view('abonnements.index',compact('abonnement'));
    }
    public function plan_owner()
    {
        $user=User::where('id',Auth::id())->first();

        $abonnement=Abonnement::all();
        return view('owner.plan',compact('abonnement','user'));
    }
    public function shows_plan(Abonnement $abo)
    {
        $user=User::where('id',Auth::id())->first();

             $user->abonnement_id =$abo->id;
             $user->start_date_abonnement=now();
             $user->end_date_abonnement=now()->addDays($abo->nbr_days);
             $user->update();
             return redirect()->route('plan.plan_owner')->with('success', 'Thank you for showsing our service');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('abonnements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required', 'string', 'max:255', Rule::in(['Plan Gratuit', 'Plan Standard', 'Plan Premium'])],
            'nbr_article' => 'required|integer',
            'price' => 'required|string',
            'type_media' => 'required|string|max:255',Rule::in(['image', 'video']),
            'nbr_scan' => 'required|integer',
            'nbr_days' => 'required|integer',
        ]);
        Abonnement::create([
         'type'=>$request->type,
         'nbr_article'=>$request->nbr_article,
         'type_media'=>$request->type_media,
         'nbr_scan'=>$request->nbr_scan,
         'price' => $request->price,
         'nbr_days'=>$request->nbr_days,
        ]);

        return redirect()->route('abonnements.index')->with('success', 'Abonnement created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abonnement $Abonnement)
    {
               return view('abonnements.edit',compact('Abonnement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abonnement $Abonnement)
    {
        $request->validate([
            'type' => ['required', 'string', 'max:255', Rule::in(['Plan Gratuit', 'Plan Standard', 'Plan Premium'])],
            'nbr_article' => 'required|integer',
            'type_media' => 'required|string|max:255',Rule::in(['image', 'video']),
            'nbr_scan' => 'required|integer',
        ]);
        // dd($Abonnement->id);
             $Abonnement->type=$request->type;
             $Abonnement->nbr_article=$request->nbr_article;
             $Abonnement->type_media=$request->type_media;
             $Abonnement->nbr_scan=$request->nbr_scan;
             $Abonnement->update();
             $user=User::where('abonnement_id','=',$Abonnement->id)->get();
               
              if($user){
                foreach($user as $owner){      
                $this->sendAbonnementUpdatedEmail($owner, $Abonnement);
                }

              }
             return redirect()->route('abonnements.index')->with('success', 'Abonnement updated successfully.');


            }
            private function sendAbonnementUpdatedEmail($user, $abonnement)
            {
                $data = ['user' => $user, 'abonnement' => $abonnement];
            
                Mail::send('emails.abon_update', $data, function ($message) use ($user) {
                    $message->to($user->email, $user->name)
                        ->subject('Your Abonnement has been Updated');
                });
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
