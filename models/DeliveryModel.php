<?

namespace Wails\Models;
use Wails\Core\Model;

final class DeliveryModel extends Model
{

    private string|null $id, $type, $country, $city, $zipcode, $street, $number, $additional, $user;

    public function id()
    { return $this->id; }

    public function type()
    { return $this->type; }
    
    public function country()
    { return $this->country; }
    
    public function city()
    { return $this->city; }
    
    public function zipcode()
    { return $this->zipcode; }
    
    public function street()
    { return $this->street; }
    
    public function number()
    { return $this->number; }
    
    public function additional()
    { return $this->additional; }
    
    public function user()
    { return $this->user; }

}