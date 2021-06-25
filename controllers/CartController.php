<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\View;

final class CartController extends Controller
{

    /**
     * Afficher Panier Session/Utilisateur
     */
    public function getCart()
    {
        $session = '9';
        View::render('session/cart', array(
            'cart' => $this->getSessionCart($session),
            'cart_subtotal' => $this->getSubtotalPrice($session),
            'cart_total' => $this->getTotalPrice($session)
        ), 'Your Cart');
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

    private function getSessionCart(string $id)
    {
        
        return $this->db->query_objects('ProductModel',
            "SELECT Product.id, Product.name, Product.picture1, Product.price, Category.VAT, Cart.quantity 
            FROM Cart 
            INNER JOIN Product
            ON Cart.product = Product.id
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Cart.session = ${id}"
         
        );

    }
    
    private function getSubtotalPrice(string $id)
    {
        
        return $this->db->query_result(
            "SELECT SUM(Product.price * Cart.quantity) AS result
            FROM Cart 
            INNER JOIN Product
            ON Cart.product = Product.id
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Cart.session = ${id}"
         
        );

    }
    
    private function getTotalPrice(string $id)
    {
        
        return $this->db->query_result(
            "SELECT SUM((Product.price + (Product.price * Category.VAT / 100)) * Cart.quantity) AS result 
            FROM Cart 
            INNER JOIN Product
            ON Cart.product = Product.id
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Cart.session = ${id}"
         
        );
    }
    
}