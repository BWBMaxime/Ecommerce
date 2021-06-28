<?

namespace Wails\Models;
use Wails\Core\Asset;
use Wails\Core\Model;

final class UserModel extends Model
{
    
    private string|null $id, $token, $email, $firstname, $lastname, $birth, $phone, $picture, $payment, $delivery;
    
    public function id()
    { return $this->id; }
    
    public function token()
    { return $this->token; }
    
    public function email()
    { return $this->email; }
    
    public function firstname()
    { return $this->firstname; }
    
    public function lastname()
    { return $this->lastname; }
    
    public function birth()
    { 
        return date_format(date_create($this->birth), 'Y-m-d'); 
    }
    
    public function phone()
    { return $this->phone; }
    
    public function picture()
    { return ($this->picture) ? $this->picture : Asset::image_path('blank'); }
    
    public function payment()
    { return $this->payment; }
    
    public function delivery()
    { return $this->delivery; }

}