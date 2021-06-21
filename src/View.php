<?

namespace Wails\Core;

final class View
{

    public static function render(string $view, array $params = [])
    {

        extract(array(
            "ASSET" => "\\Wails\\Core\\Asset",
            "ERROR" => "\\Wails\\Core\\Error",
            "UTILS" => "\\Wails\\Core\\Utils"
        ));

        extract($params);

        include Asset::view($view, $params);

    }

}