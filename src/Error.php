<?

namespace Wails\Core;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

final class Error
{

    public static function misc(string $message)
    {

        Utils::log($message);
        exit();

    }

    public static function status(int $status)
    {

        Utils::log(match ($status) {
            400 => "ERROR 400 : Bad Request",
            401 => "ERROR 401 : Unauthorized",
            403 => "ERROR 403 : Forbidden",
            404 => "ERROR 404 : Not Found",
            418 => "ERROR 418 : I'm a teapot"
        });
        exit();

    }

    public static function syntax(string $file)
    {

        Utils::log("SYNTAX ERROR : ${file}");
        exit();

    }

    public static function file(string $file)
    {

        Utils::log("FILE NOT FOUND : ${file}");
        exit();

    }

    public static function method(string $class, string $method, string $http = 'GET')
    {

        Utils::log("METHOD ERROR : Method \"${http}:${method}\" of Class \"${class}\" doesn't exist");
        exit();

    }

    public static function http(string $method, string $http = 'GET')
    {

        Utils::log("HTTP ERROR : Method \"${method}\" doesn't exist for HTTP request \"${http}\"");
        exit();

    }

    public static function script(string|int $num)
    {

        Utils::log("SCRIPT ERROR : Missing arguments, number of required arguments is ${num}" . PHP_EOL);
        exit();

    }

    public static function provider(IdentityProviderException $error)
    {

        Utils::log("PROVIDER ERROR : " . $error->getMessage() . PHP_EOL);
        exit();

    }

}