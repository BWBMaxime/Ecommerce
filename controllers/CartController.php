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
            $stock = (int) HTTP::request(true)->stock;
            $add = (bool) HTTP::request(true)->add;

            if ($this->inCart($id)) {

                $_SESSION['CART'] = array_values(
                    array_map(function($product) use($id, $quantity, $stock, $add)
                        {
                            return ($product['id'] !== $id) ? $product : array(
                                'id' => $id,
                                'quantity' => $this->updateQuantity($quantity, $stock, $add, $product)
                            );
                        }, $_SESSION['CART']
                    )
                );
    
            } else {

                array_push($_SESSION['CART'], array(
                    'id' => $id,
                    'quantity' => $this->updateQuantity($quantity, $stock, $add)
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

    private function checkRequest() : bool
    {

        return isset(HTTP::request(true)->id) && isset(HTTP::request(true)->quantity)
            && isset(HTTP::request(true)->stock) && isset(HTTP::request(true)->add);

    }

    private function inCart(int $id) : bool
    {

        return (count(array_filter($_SESSION['CART'], function($product) use($id)
            {
                return $product['id'] == $id;
            }
        )) < 1) ? false : true;

    }

    private function updateQuantity(int $quantity, int $stock, bool $add, array $product = array('quantity' => 0)) : int
    {

        $result = match ($add) {
            true => $product['quantity'] + $quantity,
            default => $quantity
        };

        return ($result >= $stock) ? $stock : $result;

    }

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
    
}