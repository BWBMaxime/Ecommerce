<?

namespace Wails\Core;

final class View
{

    public static function render(string $view, array $params = [])
    {

        extract(array(
            "_ASSET" => "\\Wails\\Core\\Asset",
            "_ERROR" => "\\Wails\\Core\\Error",
            "_UTILS" => "\\Wails\\Core\\Utils",
            "_VIEW" => "\\Wails\\Core\\View"            
        ));

        extract($params);

        include Asset::view($view, $params);

    }

    public static function include(string $view, array $params = [])
    {

        extract($params);

        include Asset::view($view, $params);

    }

}