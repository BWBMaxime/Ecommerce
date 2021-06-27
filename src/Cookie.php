<?

namespace Wails\Core;

final class Cookie
{

    public static function get(string $name)
    {

        $_COOKIE[$name];

    }
    
    public static function set(string $name, mixed $value, int $time)
    {

        setcookie($name, $value, time() + $time, '/');

    }
    
    public static function unset(string $name)
    {

        setcookie($name, null, time() - 3600);

    }

}