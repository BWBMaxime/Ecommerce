<?

namespace Wails\Models;
use Wails\Core\Model;

final class ProductModel extends Model
{

    private string|null $id;
    private string|null $name;
    private string|null $description;
    private string|null $price;
    private string|null $stock;
    private string|null $quantity;
    private string|null $picture1;
    private string|null $picture2;
    private string|null $picture3;
    private string|null $category;
    private string|null $VAT;

    public function id() { return $this->id; }
    public function name() { return $this->name; }
    public function description() { return $this->description; }
    public function stock() { return $this->stock; }
    public function quantity() { return $this->quantity; }
    public function picture1() { return $this->picture1; }
    public function picture2() { return $this->picture2; }
    public function picture3() { return $this->picture3; }
    public function category() { return $this->category; }
    public function VAT() { return $this->VAT; }
    
    public function price(bool $VAT = false)
    {
        return number_format(($VAT) ? $this->price + ($this->price * $this->VAT / 100) : $this->price, 2);
    }

}