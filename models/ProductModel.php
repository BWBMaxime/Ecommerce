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
    private string|null $picture1;
    private string|null $picture2;
    private string|null $picture3;
    private string|null $category;
    private string|null $VAT;

    public function id() { return $this->id; }
    public function name() { return $this->name; }
    public function description() { return $this->description; }
    public function price() { return $this->price; }
    public function stock() { return $this->stock; }
    public function picture1() { return $this->picture1; }
    public function picture2() { return $this->picture2; }
    public function picture3() { return $this->picture3; }
    public function category() { return $this->category; }
    public function VAT() { return $this->VAT; }

}