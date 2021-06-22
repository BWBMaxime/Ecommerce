<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class CartController extends Controller
{
    public function cart()
    {

        View::render("cart");

    }
}