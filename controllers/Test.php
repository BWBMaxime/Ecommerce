<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

class Test extends Controller
{

    public function home ()
    {
        View::render("navbar");
    }

}