<?

namespace Wails\Models;
use Wails\Core\Model;
use Wails\Core\Utils;

final class CartModel extends Model
{

    private array $products;

    public function __construct(array $products)
    {

        $this->products = $products;

    }

    public function products()
    { return $this->products; }

    public function totalVAT()
    {

        return array_sum(array_map(function($obj) {
            return $obj->totalPrice(true) - $obj->totalPrice(false);
        }, $this->products));
        
    }

    public function totalPrice(bool $VAT = false)
    {

        return array_sum(array_map(function($obj) use($VAT) {
            return $obj->totalPrice($VAT);
        }, $this->products));
        
    }

    public function isAvailable() : bool
    {

        return Utils::array_check(array_map(function($obj) {
            return $obj->isAvailable();
        }, $this->products));

    }

}