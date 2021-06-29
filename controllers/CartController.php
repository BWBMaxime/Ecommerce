<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\Token;
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
            'cart' => $this->cart(true)
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

        if (isset(HTTP::request(true)->id)) {

            $id = HTTP::request(true)->id;

            $_SESSION['CART'] = array_values(
                array_filter($_SESSION['CART'], function($obj) use($id)
                    {
                        return $obj['id'] !== (int) $id;
                    }  
                )
            );

            HTTP::response(200);

        } else {

            HTTP::response(400);

        }

    }

    /**
     * Commande validée
     */
    public function getCheckout(string $checkout)
    {
        
        View::render('session/checkout', array(
            'checkout' => $checkout
        ), 'Checkout');

    }
    
    /**
     * Validation de la commande
     */
    public function checkout()
    {

        $checkout = $this->processCheckout($this->cart(), Token::get('id'));

        if ($checkout) {

            $_SESSION['CART'] = [];
            HTTP::response(200, $checkout);

        } else {

            Error::misc('CHECKOUT ERROR : Your order can\'t be validated, please retry later');

        }

    }

    private function cart(bool $max = false)
    {

        if (!isset($_SESSION['CART'])) $_SESSION['CART'] = [];
        return (count($_SESSION['CART']) < 1) ?
            [] : new CartModel(($max) ? $this->getProducts($_SESSION['CART']) : $this->getProductsMin($_SESSION['CART']));

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

    private function getProducts(array $products)
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

    private function getProductsMin(array $products)
    {
        
        $result = $this->db->query_objects('ProductModel',
           "SELECT Product.id, Product.price, Product.stock, Category.VAT
            FROM Product
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Product.id = " . join(" OR Product.id = ", array_map(function($x) { return $x['id']; }, $products))
        );
        array_walk($result, function(&$obj, $key, $value){ $obj->setQuantity($value[$key]['quantity']); }, $products);
        return $result;

    }

    private function processCheckout(object $cart, int|null $user = null) : bool
    {

        if (!$cart->isAvailable()) return false;

        $checkout = $this->addCheckout($cart->totalPrice(true), ($user) ? $user : null);
        $this->checkoutProducts($checkout, $cart->products());
        $this->updateStocks($cart->products());

        return true;

    }

    private function updateStocks(array $products)
    {

        $this->db->query();

    }

    private function addCheckout(float $price, int|null $user)
    {
        
        $this->db->query(
           "INSERT INTO Checkout (tracking, contact, amount, date, bill, user, state)
            VALUES ('wZErxrv7mb5GfzNBa9aBmshIleSkxFQkaxlg3fNwD31Jmxn', 'pdudson2@arstechnica.com', ${price}, CURRENT_TIMESTAMP, 'https://sohu.com/justo/maecenas/rhoncus/aliquam/lacus/morbi.aspx', ${user}, 0)"
        );

        return $this->db->lastID();

    }

    private function checkoutProducts(int $checkout, array $products)
    {
        
        $this->db->query(join(';',
            array_map(function($product) use($checkout)
            {

                $id = $product->id();
                $quantity = $product->quantity();
                return "INSERT INTO CheckoutProduct (checkout, product, quantity) VALUES (${checkout}, ${id}, ${quantity})";

            }, $products)
        ));

    }
    
}