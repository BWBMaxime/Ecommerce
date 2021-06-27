<?

namespace Wails\Models;
use Wails\Core\Model;

final class CheckoutModel extends Model
{

    private string|null $id, $contact, $bill, $tracking, $date, $amount, $user, $state;
    
    public function id()
    { return $this->id; }
    
    public function contact()
    { return $this->contact; }
    
    public function bill()
    { return $this->bill; }
    
    public function tracking()
    { return $this->tracking; }
    
    public function date()
    { return $this->date; }
    
    public function amount()
    { return $this->amount; }
    
    public function user()
    { return $this->user; }
    
    public function state()
    { return $this->state; }

}