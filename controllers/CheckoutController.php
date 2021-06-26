<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\Session;
use Wails\Core\View;

final class CheckoutController extends Controller
{

    /**
     * Connexion/Inscription ou Anonyme
     */
    public function getCheckout()
    {
        
        View::render('checkout', array(), 'Checkout');

    }
    
    /**
     * Mise à jour / Validation de la commande
     */
    public function updateCheckout()
    {}

    /**
     * Commande validée
     */
    public function getFinish()
    {

        View::render('checkout/finish', array(), 'Order');

    }

}