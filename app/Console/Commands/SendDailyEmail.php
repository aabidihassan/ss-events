<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Fournisseur;
use App\Mail\ExpiredSubscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Carbon\Carbon;

class SendDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:daily-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $fournisseursDes = Fournisseur::join('abonnements', 'abonnements.id_fournisseur', '=', 'fournisseurs.id')
                ->whereDate('abonnements.end_date', '=', Carbon::now()->format('Y-m-d'))
                ->select('fournisseurs.id', 'fournisseurs.nom', 'fournisseurs.prenom', 'fournisseurs.email')
                ->get();
            foreach ($fournisseursDes as $f) {
                Fournisseur::where('id', $f->id)->update(['statut'=>0]);
                $data = [
                    'nom' => $f->nom,
                    'prenom' => $f->prenom,
                    'content' =>[
                        "Nous espérons que ce message vous trouve en bonne santé. Nous souhaitons vous informer que votre abonnement avec nous a maintenant expiré. Nous vous remercions de votre confiance et tenons à vous remercier pour votre soutien continu.",
                        "Nous souhaitons vous rappeler qu'en tant qu'abonné expiré, vous ne pourrez plus accéder aux avantages et services inclus dans votre abonnement. Cependant, si vous souhaitez renouveler votre abonnement, veuillez nous le faire savoir et nous serons heureux de vous aider avec le processus.",
                        "Renouveler votre abonnement vous offrira non seulement un accès ininterrompu à nos services, mais également des avantages et des remises continus en tant qu'abonné(e) privilégié(e)."
                    ]
                ];
                Mail::to($f->email)->send(new ExpiredSubscription($data, 'Avis d\'expiration d\'abonnement pour '.$f->nom));
            }

            //Send Annonce Pefor 15 day
            $end15Date = Carbon::now()->subDays(15)->format('Y-m-d');
            $f15day = Fournisseur::join('abonnements', 'abonnements.id_fournisseur', '=', 'fournisseurs.id')
                ->whereDate('abonnements.end_date', '=', $end15Date)
                ->select('fournisseurs.id', 'fournisseurs.nom', 'fournisseurs.prenom', 'fournisseurs.email')
                ->get();
            foreach ($f15day as $f) {
                $data = [
                    'nom' => $f->nom,
                    'prenom' => $f->prenom,
                    'content' =>[
                        "Nous espérons que cette notification vous trouve en bonne santé. Nous souhaitons vous informer que votre abonnement auprès de notre entreprise arrivera à expiration dans les 15 prochains jours.",
                        "Nous souhaitons vous rappeler que lorsque votre abonnement expire, vous n\'aurez plus accès aux avantages et aux services inclus dans votre abonnement. Si vous souhaitez continuer à bénéficier de ces avantages et services, nous vous invitons à renouveler votre abonnement avant la date d\'expiration.",
                        "Nous tenons à vous remercier pour votre confiance et votre fidélité envers notre entreprise. Nous apprécions votre soutien continu et nous sommes impatients de continuer à vous offrir des services de qualité supérieure.",
                        "Si vous avez des questions concernant votre abonnement ou si vous souhaitez renouveler votre abonnement, veuillez contacter notre service clientèle dès que possible. Nous serons heureux de vous aider à renouveler votre abonnement et à répondre à toutes vos questions"
                    ] 
                ];
                Mail::to($f->email)->send(new ExpiredSubscription($data, 'Avis d\'expiration d\'abonnement dans 15 jours pour '.$f->nom));
            }
        } catch (\Exception $th) {
            
        }
    }
}
