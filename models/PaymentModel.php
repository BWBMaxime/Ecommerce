<?

namespace Wails\Models;
use Wails\Core\Model;

final class PaymentModel extends Model
{

    private string|null $id, $type, $number, $name, $expiration, $user;
    
    public function id()
    { return $this->id; }
    
    public function type()
    { return $this->type; }
    
    public function number()
    { return $this->number; }
    
    public function name()
    { return $this->name; }
        
    public function user()
    { return $this->user; }

    public function expiration()
    {
        
        return date_format(date_create($this->expiration), 'm/Y');
    
    }

}