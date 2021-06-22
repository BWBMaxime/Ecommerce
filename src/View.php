<?

namespace Wails\Core;

final class View
{

    public static function render(string $view, array $params = [])
    {

        extract(array(
            "_ASSET" => "\\Wails\\Core\\Asset",
            "_ERROR" => "\\Wails\\Core\\Error",
            "_UTILS" => "\\Wails\\Core\\Utils"
        ));

        extract($params);

        include Asset::view($view, $params);

    }

}