<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class CartController extends Controller
{

    /**
     * Afficher Panier Session/Utilisateur
     */
    public function getCart()
    {
        View::render("cart/cart");
    }

    /**
     * Ajouter Produit Panier Session/Utilisateur
     */
    public function addProduct()
    {}

    /**
     * Modifier quantité Produit Panier Session/Utilisateur
     */
    public function updateProduct()
    {}

    /**
     * Supprimer Produit Panier Session/Utilisateur
     */
    public function deleteProduct()
    {}

}