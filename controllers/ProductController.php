<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class ProductController extends Controller
{

    /**
     * Liste des Produits
     */
    public function home()
    {
        View::render("product/list");
    }

    /**
     * Détail d'un produit
     */
    public function product()
    {
        View::render("product/detail");
    }

}