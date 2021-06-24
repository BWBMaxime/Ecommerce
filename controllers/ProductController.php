<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Error;
use Wails\Core\Session;
use Wails\Core\View;

final class ProductController extends Controller
{

    /**
     * Liste des Produits
     */
    public function home()
    {
        
        SessionController::guard();
        View::render('product/list', array(
            'products' => $this->getAllProducts()
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

}