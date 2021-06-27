<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\View;
use Wails\Models\CartModel;

final class CartController extends Controller
{

    /**
     * Afficher Panier Session/Utilisateur
     */
    public function getCart()
    {

        View::render('session/cart', array(
            'cart' => $this->cart()
        ), 'Your Cart');

    }

    /**
     * Ajouter produit / Modifier quantité Produit Panier Session/Utilisateur
     */
    public function updateProduct()
    {

        if ($this->checkRequest())
        {

            $id = (int) HTTP::request(true)->id;
            $quantity = (int) HTTP::request(true)->quantity;
            $add = (bool) HTTP::request(true)->add;

            if ($this->inCart($id)) {

                $_SESSION['CART'] = array_values(
                    array_map(function($product) use($id, $quantity, $add)
                        {
                            return ($product['id'] !== $id) ? $product : array(
                                'id' => $id,
                                'quantity' => ($add) ? $product['quantity'] + $quantity : $quantity
                            );
                        }, $_SESSION['CART']
                    )
                );
    
            } else {

                array_push($_SESSION['CART'], array(
                    'id' => $id,
                    'quantity' => $quantity
                ));

            }

            HTTP::response(200);

        } else {

            HTTP::response(400);

        }
        
    }

    /**
     * Supprimer Produit Panier Session/Utilisateur
     */
    public function deleteProduct()
    {

        if (isset(HTTP::request(true)->id))
        {

            $id = HTTP::request(true)->id;

            $this->setCart(array_values(
                array_filter($_SESSION['CART'], function($obj) use($id)
                    {
                        return $obj['id'] !== (int) $id;
                    }  
                )
            ));

            HTTP::response(200);

        } else {

            HTTP::response(400);

        }

    }

    private function cart()
    {

        if (!isset($_SESSION['CART'])) $_SESSION['CART'] = [];
        return (count($_SESSION['CART']) < 1) ?
            array() : new CartModel($this->getCartProducts($_SESSION['CART']));

    }

    private function setCart(mixed $value)
    {

        $_SESSION['CART'] = $value;

    }

    private function checkRequest()
    {

        return isset(HTTP::request(true)->id) && isset(HTTP::request(true)->quantity) && isset(HTTP::request(true)->add);

    }

    private function inCart(int $id)
    {

        return (count(array_filter($_SESSION['CART'], function($product) use($id)
            {
                return $product['id'] == $id;
            }
        )) < 1) ? false : true;

    }


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
            WHERE Product.id = " . join(" OR Product.id = ", array_map(function($x) { return $x['id']; }, $products))
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