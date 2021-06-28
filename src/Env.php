<?

namespace Wails\Core;
use \Symfony\Component\Dotenv\Dotenv;

final class Env
{

    public static function get(string $key)
    {

        self::set();
        return $_ENV[$key];

    }

    private static function set()
    {

        (new Dotenv())->load(__DIR__.'/../.env');

    }

}