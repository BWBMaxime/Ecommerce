<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class UserController extends Controller
{

    public function home()
    {

        View::render('home', array(
            "products" => $this->getProducts(),
            "product_detail" => $this->getProduct(5)
        ));

    }

    private function getProducts()
    {

        return $this->db->query_objects("ProductModel",
          "SELECT Product.id, Product.name, Product.price, Product.stock, Product.picture1, Category.VAT
           FROM Product 
           INNER JOIN Category
           ON Product.category = Category.id"
        );

    }

    private function getProduct($id)
    {

        return $this->db->query_object("ProductModel",
           "SELECT id, name, description, price, stock, picture1, picture2, picture3, category
            FROM Product
            WHERE id = ${id}"
        );

    }

}