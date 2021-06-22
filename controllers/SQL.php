<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class SQL extends Controller
{

    public function products()
    {

        View::render('products/list', array(
            'products' => $this->get_products()
        ));

    }

    public function product(string $id)
    {

        View::render('products/detail', array(
            'product' => $this->get_product($id)
        ));

    }

    private function get_products()
    {

        return $this->db->query_objects('ProductModel',
          "SELECT Product.id, Product.name, Product.price, Product.stock, Product.picture1, Category.VAT
           FROM Product 
           INNER JOIN Category
           ON Product.category = Category.id"
        );

    }

    private function get_product(string $id)
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

    private function get_current_user_min(string $id)
    {

        return $this->db->query_object('UserModel',
           "SELECT id, firstname, picture
            FROM User
            WHERE id = ${id}"
        );

    }

    private function get_current_user(string $id)
    {

        return $this->db->query_object('UserModel',
           "SELECT id, email, firstname, lastname, birth, phone, picture, payment, delivery
            FROM User
            WHERE id = ${id}"
        );

    }

}