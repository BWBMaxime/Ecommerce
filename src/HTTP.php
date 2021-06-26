<?

namespace Wails\Core;

final class HTTP
{

    public static function response(int $status, mixed $value = null, bool $json = false)
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        http_response_code($status);
        echo ($json) ? json_encode($value) : json_encode($value);

    }
    
    public static function request(bool $json = false)
    {

        return ($json) ? json_decode(file_get_contents('php://input')) : file_get_contents('php://input');

    }

}