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
        
        View::render('product/list', array(
            'products' => $this->getPagedProducts($page),
            'categories' => $this->getCategory(),
            'current_page' => $page,
            'last_page' => $this->getLastPage()
        ));

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

    private function getPagedProducts($page = 1, $limit = 20)
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

    private function getAllProducts()
    {

        
        return $this->db->query_objects('ProductModel',
          "SELECT Product.id, Product.name, Product.price, Product.stock, Product.picture1, Category.VAT
           FROM Product 
           INNER JOIN Category
           ON Product.category = Category.id"
        );

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

    private function getLastPage($limit = 20)
    {

        return ceil($this->db->query_result(
          "SELECT COUNT(id) AS result
           FROM Product"
        ) / $limit);

    }

    private function getCategory()
    {
        return $this->db->query_objects('CategoryModel',
           "SELECT *
            FROM Category"
        );
    }


}