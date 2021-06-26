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
        $cart = array(
            array("id" => 1, "quantity" => 8),
            array("id" => 2, "quantity" => 3),
            array("id" => 3, "quantity" => 2),
            array("id" => 5, "quantity" => 1),
            array("id" => 7, "quantity" => 4),
            array("id" => 297, "quantity" => 5)
        );
        View::render('session/cart', array(
            'cart' => new \Wails\Models\CartModel($this->getCartProducts($cart))
        ), 'Your Cart');
    }

    /**
     * Ajouter produit / Modifier quantité Produit Panier Session/Utilisateur
     */
    public function updateProduct()
    {}

    /**
     * Supprimer Produit Panier Session/Utilisateur
     */
    public function deleteProduct()
    {}

    // private function getSessionCart(string $id)
    // {
        
    //     return $this->db->query_objects('ProductModel',
    //         "SELECT Product.id, Product.name, Product.picture1, Product.price, Category.VAT, Cart.quantity 
    //         FROM Cart 
    //         INNER JOIN Product
    //         ON Cart.product = Product.id
    //         INNER JOIN Category
    //         ON Product.category = Category.id
    //         WHERE Cart.session = ${id}"
    //     );

    // }
    
    // private function getSubtotalPrice(string $id)
    // {
        
    //     return $this->db->query_result(
    //         "SELECT SUM(Product.price * Cart.quantity) AS result
    //         FROM Cart 
    //         INNER JOIN Product
    //         ON Cart.product = Product.id
    //         INNER JOIN Category
    //         ON Product.category = Category.id
    //         WHERE Cart.session = ${id}"
    //     );

    // }
    
    // private function getUnitPrice(string $id)
    // {
        
    //     return $this->db->query_result(
    //        "SELECT Product.price AS result
    //         FROM Product
    //         WHERE Product.id = ${id}"
    //     );

    // }

    private function getCartProducts(array $products)
    {
        
        $result = $this->db->query_objects('ProductModel',
           "SELECT Product.id, Product.name, Product.picture1, Product.price, Product.stock, Category.VAT
            FROM Product
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Product.id = " . join(" OR Product.id = ", array_map(function($x) { return $x["id"]; }, $products))
        );
        array_walk($result, function(&$obj, $key, $value){ $obj->setQuantity($value[$key]['quantity']); }, $products);
        return $result;

    }

    // private function getCartUnitPrice(array $products)
    // {
        
    //     return $this->db->query_result(
    //        "SELECT SUM(price) AS result
    //         FROM Product
    //         WHERE id = " . join(" OR id = ", $products)
    //     );

    // }
    // private function getCartVATPrice(array $products)
    // {
        
    //     return $this->db->query_result(
    //        "SELECT SUM(Product.price + (Product.price * Category.VAT / 100)) AS result
    //         FROM Product
    //         INNER JOIN Category
    //         ON Product.category = Category.id
    //         WHERE Product.id = " . join(" OR Product.id = ", $products)
    //     );

    // }

    // private function getVATPrice(string $id)
    // {
        
    //     return $this->db->query_result(
    //        "SELECT Product.price + (Product.price * Category.VAT / 100) AS result
    //         FROM Product
    //         INNER JOIN Category
    //         ON Product.category = Category.id
    //         WHERE Product.id = ${id}"
    //     );

    // }
    
    // private function getTotalPrice(string $id)
    // {
        
    //     return $this->db->query_result(
    //        "SELECT SUM(Product.price + (Product.price * Category.VAT / 100)) AS result 
    //         FROM Cart 
    //         INNER JOIN Product
    //         ON Cart.product = Product.id
    //         INNER JOIN Category
    //         ON Product.category = Category.id
    //         WHERE Cart.session = ${id}"
         
    //     );
    // }
    
}