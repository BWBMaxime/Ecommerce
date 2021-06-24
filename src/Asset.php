<?

namespace Wails\Core;

final class Asset
{

    private static array $images = ['jpg', 'png', 'svg', 'ico', 'gif'];
    private static array $scripts = ['js', 'jsx', 'ts', 'tsx'];
    private static array $styles = ['css', 'sass', 'scss'];
    // private static array $databases = ['sql', 'php'];
    private static array $documents = ['pdf'];
    private static array $views = ['php', 'html'];

    private static function get(string $path, array $extensions) : string
    {

        foreach ($extensions as $extension) {

            if (is_file($_SERVER['DOCUMENT_ROOT']."${path}.${extension}"))
                return "${path}.${extension}";

        };

        Error::file($path);

    }

    public static function document(string $key, string $title = "", bool $blank = false)
    {

        self::document_url(self::document_path($key), $title, $blank);

    }

    public static function image(string $key, string $alt = '')
    {

        echo "<img src=\"..";
        echo self::get("/assets/images/${key}", self::$images);
        echo ($alt) ? "\" alt=\"${alt}\">" : "\">";

    }

    public static function script(string $key, bool $async = false)
    {

        echo "<script src=\"..";
        echo self::get("/assets/scripts/${key}", self::$scripts);
        echo ($async) ? "\" async defer></script>" : "\"></script>";

    }

    public static function style(string $key)
    {

        echo "<link rel=\"stylesheet\" href=\"..";
        echo self::get("/assets/styles/${key}", self::$styles);
        echo "\">";

    }

    public static function document_url(string $key, string $title = "", bool $blank = false)
    {

        echo "<a href=\"${key}";
        echo ($blank) ? "\" target=\"_blank\">${title}</a>" : "\">${title}</a>";

    }

    public static function image_url(string $key, string $alt = '')
    {

        echo "<img src=\"${key}";
        echo ($alt) ? "\" alt=\"${alt}\">" : "\">";

    }

    public static function script_url(string $key, bool $async = false)
    {

        echo ($async) ? "<script src=\"${key}\" async defer></script>" : "<script src=\"${key}\"></script>";

    }
    
    public static function style_url(string $key)
    {

        echo "<link rel=\"stylesheet\" href=\"${key}\">";

    }

    public static function view_path(string $key)
    {

        return $_SERVER['DOCUMENT_ROOT'] . self::get("/views/${key}", self::$views);

    }

    public static function document_path(string $key)
    {

        return $_SERVER['HTTP_HOST'] . self::get("/assets/documents/${key}", self::$documents);

    }

    public static function image_path(string $key)
    {

        return ".." . self::get("/assets/images/${key}", self::$images);

    }

    public static function script_path(string $key)
    {

        return ".." . self::get("/assets/scripts/${key}", self::$scripts);

    }

    public static function style_path(string $key)
    {

        return ".." . self::get("/assets/styles/${key}", self::$styles);

    }

}