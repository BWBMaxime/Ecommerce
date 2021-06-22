<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

class ProductController extends Controller
{
    public function home()
    {

        View::render("product-list");

    }

    public function product()
    {
        
        View::render("product-detail");

    }

}