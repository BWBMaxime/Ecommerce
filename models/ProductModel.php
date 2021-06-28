<?

namespace Wails\Models;
use Wails\Core\Asset;
use Wails\Core\Model;

final class ProductModel extends Model
{

    private string|null $id, $name, $description, $price, $stock, $quantity, $picture1, $picture2, $picture3, $category, $VAT;

    public function id()
    { return (int) $this->id; }

    public function name()
    { return $this->name; }

    public function description()
    { return $this->description; }

    public function stock()
    { return (int) $this->stock; }

    public function getPrice()
    { return (float) number_format($this->price, 2); }

    public function quantity()
    { return (int) $this->quantity; }

    public function picture1()
    { return ($this->picture1) ? $this->picture1 : Asset::image_path('blank'); }

    public function picture2()
    { return ($this->picture2) ? $this->picture2 : Asset::image_path('blank'); }

    public function picture3()
    { return ($this->picture3) ? $this->picture3 : Asset::image_path('blank'); }

    public function category()
    { return $this->category; }

    public function VAT()
    { return (int) $this->VAT; }

    public function price(bool $VAT = false)
    {

        return (float) number_format(($VAT) ?
            $this->getPrice() + ($this->getPrice() * $this->VAT() / 100) : $this->getPrice(), 2);

    }
    
    public function totalPrice(bool $VAT = false)
    {

        return (float) number_format($this->price($VAT) * $this->quantity(), 2);

    }

    public function setQuantity($value)
    { $this->quantity = (string) $value; }


}