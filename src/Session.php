<?

namespace Wails\Core;

final class Session
{

    public function __construct()
    {

        session_start();
        if (!Session::isSet()) Session::status(false);

    }

    public static function status(bool $bool)
    {

        $_SESSION['STATUS'] = $bool;

    }

    public static function isSet() : bool
    {

        return (isset($_SESSION) && isset($_COOKIE['PHPSESSID'])) ? true : false;

    }

    public static function isLogged() : bool
    {

        return (isset($_SESSION['STATUS'])) ? $_SESSION['STATUS'] : false;

    }

}