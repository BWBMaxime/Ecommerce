<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Error;
use Wails\Core\Session;
use Wails\Core\View;

final class CheckoutController extends Controller
{

    /**
     * Connexion/Inscription ou Anonyme
     */
    public function getSession()
    {}
    
    /**
     * Choix de l'addresse de livraison
     */
    public function getDelivery()
    {}

    /**
     * Choix du moyen de paiement
     */
    public function getPayment()
    {

        View::include('checkout/placeholder');

    }

    /**
     * Validation de la commande
     */
    public function getFinish()
    {}

}