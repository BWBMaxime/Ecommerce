<?

namespace Wails\Core;

final class Session
{

    private static bool $status = false;

    public function __construct()
    {

        session_start();

    }

    public static function status(bool $bool)
    {

        self::$status = $bool;

    }

    public static function isSet() : bool
    {

        return (isset($_SESSION) && isset($_COOKIE['PHPSESSID'])) ? true : false;

    }

    public static function isLogged() : bool
    {

        return (self::$status) ? true : false;

    }

}