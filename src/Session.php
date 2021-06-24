<?

namespace Wails\Core;

final class Session
{

    public function __construct()
    {

        session_start();

    }

    public static function isSet()
    {

        return (isset($_SESSION) && isset($_COOKIE['PHPSESSID'])) ? true : false;

    }

}