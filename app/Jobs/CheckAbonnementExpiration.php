<?php

use App\Models\Abonnement;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckAbonnementExpiration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Find users with Abonnements ending within the next two minutes
        $users = User::where('end_date_abonnement', '<=', now()->addMinutes(2))->get();
       
        foreach ($users as $user) {
            $abonnement = Abonnement::find($user->abonnement_id);
            $this->sendAbonnementEndingEmail($user, $abonnement);
        }
    }
    
    private function sendAbonnementEndingEmail($user, $abonnement)
    {
        $data = ['user' => $user, 'abonnement' => $abonnement];
    
        Mail::send('emails.abonnement.ending', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your Abonnement is Ending Soon');
        });
    }
    
}
