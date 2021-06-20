<?

namespace Wails\Core;

final class View
{

    public static function render(string $view, array $params = [])
    {

        self::yield_list($params);

        Asset::view($view);

    }

    public static function yield_list(array $yields)
    {

        foreach ($yields as $key => $value)
        {
            self::yield($key, $value);
        }

    }

    public static function yield(string $key, mixed $value)
    {

        $$key = $value;

    }

}