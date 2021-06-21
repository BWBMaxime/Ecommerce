<?

namespace Wails\Core;

final class View
{

    public static function render(string $view, array $params = [])
    {

        extract($params);

        include Asset::view($view, $params);

    }

}