<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

class ProductDetailController extends Controller
{
    public function product()
    {
        View::render("product-detail");

    }

}