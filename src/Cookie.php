<?

namespace Wails\Core;
use Firebase\JWT\JWT;
use Exception;

final class Cookie
{

    public static function get(string $name)
    {

        $_COOKIE[$name];

    }
    
    public static function set(string $name, mixed $value)
    {

        setcookie($name, $value, self::expiration(), '/', '');

    }
    
    public static function unset(string $name)
    {

        setcookie($name, null, time() - 3600);

    }

    public static function expiration()
    {

        return time() + (3600 * Env::get('EXP'));

    }

}