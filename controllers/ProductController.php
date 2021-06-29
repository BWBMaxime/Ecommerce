<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\View;

final class ProductController extends Controller
{

    /**
     * Liste des Produits
     */
    public function home(string $page = '1')
    {
        
        if (!self::isSearch()) {

            View::render('product/list', array(
                'products' => $this->getProducts($page),
                'current_page' => (int) $page,
                'last_page' => $this->getLastPage(),
                'search' => false
            ));

        } else {

            $last_page = $this->searchLastPage($_GET['search']);

            if ($last_page < $page) View::redirect('/');

            View::render('product/list', array(
                'products' => $this->searchProducts($page, $_GET['search']),
                'current_page' => (int) $page,
                'last_page' => $last_page,
                'search' => true
            ));

        }
       
    }

    /**
     * Détail d'un produit
     */
    public function product($id)
    {

        $product = $this->getProduct($id);

        if ($product) {

            View::render('product/detail', array(
                'product' => $product
            ), $product->name());

        } else {

            Error::status(404);
 
        }

    }

    private function getProduct(string $id)
    {

        return $this->db->query_object('ProductModel',
           "SELECT Product.id, Product.name, Product.description, Product.price, Product.stock,
                Product.picture1, Product.picture2, Product.picture3, Product.category, Category.VAT
            FROM Product
            INNER JOIN Category
            ON Product.category = Category.id
            WHERE Product.id = ${id}"
        );

    }

    private function getProducts($page, int $limit = 20)
    {
        
        return $this->db->query_objects('ProductModel',
          "SELECT Product.id, Product.name, Product.price, Product.stock, Product.picture1, Category.VAT
           FROM Product 
           INNER JOIN Category
           ON Product.category = Category.id
           LIMIT ${limit}
           OFFSET " . (($page < 1) ? 0 : ($page - 1)) * $limit
        );

    }

    private function getLastPage(int $limit = 20)
    {

        return (int) ceil($this->db->query_result(
          "SELECT COUNT(id) AS result
           FROM Product"
        ) / $limit);

    }

    private function searchProducts(string|int $page, string $search, int $limit = 20)
    {
        
        return $this->db->query_objects('ProductModel',
          "SELECT Product.id, Product.name, Product.price, Product.stock, Product.picture1, Category.VAT
           FROM Product 
           INNER JOIN Category
           ON Product.category = Category.id
           WHERE Product.name
           LIKE '%${search}%'
           LIMIT ${limit}
           OFFSET " . (($page < 1) ? 0 : ($page - 1)) * $limit
        );

    }

    private function searchLastPage(string $search, int $limit = 20)
    {

        return (int) ceil($this->db->query_result(
          "SELECT COUNT(id) AS result
           FROM Product
           WHERE Product.name
           LIKE '%${search}%'"
        ) / $limit);

    }

    private static function isSearch()
    {

        return (isset($_GET) && isset($_GET['search'])) ? preg_match('/^\w+$/i', $_GET['search']) : false;

    }

}