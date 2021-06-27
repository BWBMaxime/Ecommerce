<?

namespace Wails\Models;
use Wails\Core\Model;

final class CategoryModel extends Model
{

    private string|null $id, $name, $VAT;

    public function id()
    { return $this->id; }
    
    public function name()
    { return $this->name; }

    public function VAT()
    { return $this->VAT; }
    
}