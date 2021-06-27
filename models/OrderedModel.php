<?

namespace Wails\Models;
use Wails\Core\Model;

final class OrderedModel extends Model
{

    private string|null $id;
    private string|null $contact;
    private string|null $bill;
    private string|null $tracking;
    private string|null $date;
    private string|null $amount;
    private string|null $user;
    private string|null $state;
    
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