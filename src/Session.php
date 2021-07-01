<?

namespace Wails\Core;

final class Session
{

    public function __construct()
    {

        session_start();
        if (!self::isSet()) self::status(false);

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

    public static function setURL()
    {

        $_SESSION['REDIRECT_URL'] = (isset($_SERVER['REDIRECT_URL'])) ? $_SERVER['REDIRECT_URL'] : '/';

    }

    public static function getURL()
    {

        return ($_SESSION['REDIRECT_URL']) ? $_SESSION['REDIRECT_URL'] : '/';

    }

}