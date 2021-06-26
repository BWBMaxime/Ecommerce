<?

namespace Wails\Models;
use Wails\Core\Model;

final class UserModel extends Model
{

    private string|null $id;
    private string|null $token;
    private string|null $email;
    private string|null $firstname;
    private string|null $lastname;
    private string|null $birth;
    private string|null $phone;
    private string|null $picture;
    private string|null $payment;
    private string|null $delivery;

    
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
    { return $this->birth; }
    
    public function phone()
    { return $this->phone; }
    
    public function picture()
    { return $this->picture; }
    
    public function payment()
    { return $this->payment; }
    
    public function delivery()
    { return $this->delivery; }

}