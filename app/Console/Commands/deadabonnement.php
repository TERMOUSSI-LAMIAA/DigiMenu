<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class deadabonnement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deadabonnement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('end_date_abonnement', '<=', now())->get();
       
        foreach ($users as $user) {
            $abonnement = Abonnement::find($user->abonnement_id);
            $this->sendAbonnementEndingEmail($user, $abonnement);
        }
    }
    
    private function sendAbonnementEndingEmail($user, $abonnement)
    {
        $data = ['user' => $user, 'abonnement' => $abonnement];
    
        Mail::send('emails.endAbonnnement', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your Abonnement is Ending Soon');
        });
       
    }
}
