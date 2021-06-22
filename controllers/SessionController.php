<? 
namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;
use \Stripe\Stripe;

class SessionController extends Controller{
    public function stripe(){

Stripe::setApiKey('sk_test_51J4moFARO0MVBs07TkoPEsX7shq0IQk6af7lQNjwH28XfF3WwfaFavsYuCevnmF31OLuLF6P8TyMK4iqQ2PUlWGS00sHMlKFX1');



$YOUR_DOMAIN = 'http://localhost:8888';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',

 
]); json_encode(['id' => $checkout_session->id]) ;
View::render('checkout');
}}

