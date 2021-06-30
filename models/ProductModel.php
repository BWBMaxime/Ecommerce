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
    { return (float) $this->price; }

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

    public function price(bool $VAT = false) : float
    {

        return (($VAT) ? $this->getPrice() + ($this->getPrice() * $this->VAT() / 100) : $this->getPrice());

    }
    
    public function totalPrice(bool $VAT = false)
    {

        return (float) ($this->price($VAT) * $this->quantity());

    }

    public function displayPrice(bool $VAT = false)
    {

        return number_format($this->price($VAT), 2);

    }

    public function displayTotalPrice(bool $VAT = false)
    {

        return number_format($this->totalPrice($VAT), 2);

    }

    public function shortDescription() : string
    {

        return substr($this->description, 0, 180);
        
    }

    public function isLongDescription() : bool
    {

        return (strlen($this->description) > 180) ? true : false;
        
    }

    public function isConform() : bool
    {

        return ($this->quantity() <= $this->stock() && $this->isAvailable()) ? true : false;

    }

    public function isAvailable() : bool
    {

        return ($this->stock() >= 1) ? true : false;

    }

    public function leftStock() : int
    {

        return (int) $this->stock() - $this->quantity();

    }

    public function setQuantity($value)
    { $this->quantity = (string) $value; }

}