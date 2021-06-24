<?

namespace Wails\Core;

final class View
{

    private static string $PAGE;
    private static array $PARAMS;

    public static function include(string $view, array $params = [])
    {

        extract(array(
            "_ASSET" => "\\Wails\\Core\\Asset",
            "_VIEW" => "\\Wails\\Core\\View"            
        ));

        extract($params);

        include Asset::view($view);

    }

    public static function render(string $view, array $params = [], string $title = null)
    {

        self::$PAGE = $view;
        self::$PARAMS = $params;
        self::include('layout', array("_TITLE" => $title));
        exit();

    }

    public static function yield()
    {

        self::include(self::$PAGE, self::$PARAMS);

    }

}