<?

namespace Wails\Core;

final class View
{

    private static string $PAGE;
    private static array $PARAMS;

    public static function include(string $view, array $params = [])
    {

        extract(array(
            "ASSET" => "\\Wails\\Core\\Asset",
            "SESSION" => "\\Wails\\Core\\Session",
            "VIEW" => "\\Wails\\Core\\View"          
        ));

        extract($params);

        include Asset::view_path($view);

    }

    public static function render(string $view, array $params = [], string $title = null)
    {

        extract($params);

        self::$PAGE = $view;
        self::$PARAMS = $params;
        self::include('layout', array("TITLE" => $title));

        exit;

    }

    public static function yield()
    {

        self::include(self::$PAGE, self::$PARAMS);

    }

    public static function redirect(string $url)
    {
        
        header("Location: ${url}");
        exit;

    }

}