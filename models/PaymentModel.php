<?

namespace Wails\Models;
use Wails\Core\Model;

final class PaymentModel extends Model
{

    private string|null $id;
    private string|null $type;
    private string|null $number;
    private string|null $name;
    private string|null $expiration;
    private string|null $user;

    public function id() { return $this->id; }
    public function type() { return $this->type; }
    public function number() { return $this->number; }
    public function name() { return $this->name; }
    public function expiration() { return $this->expiration; }
    public function user() { return $this->user; }

}