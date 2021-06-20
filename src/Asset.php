<?

namespace Wails\Core;

final class Asset
{

    private static array $images = ['jpg', 'png', 'svg', 'ico', 'gif'];
    private static array $scripts = ['js', 'jsx', 'ts', 'tsx'];
    private static array $styles = ['css', 'sass', 'scss'];
    private static array $databases = ['sql', 'php'];
    private static array $views = ['php', 'html'];

    private static function get(string $path, array $extensions) : string
    {

        foreach ($extensions as $extension) {

            if (is_file($_SERVER['DOCUMENT_ROOT']."${path}.${extension}"))
                return "${path}.${extension}";

        };

        Error::file($path);

    }

    public static function image(string $key, string $alt = '')
    {

        echo "<img src=\".";
        echo Asset::get("/assets/images/${key}", Asset::$images);
        echo ($alt) ? "\" alt=\"${alt}\">" : "\">";

    }

    public static function view(string $key)
    {

        include $_SERVER['DOCUMENT_ROOT'] . Asset::get("/views/${key}", Asset::$views);

    }

    public static function script(string $key)
    {

        echo "<script src=\".";
        echo Asset::get("/assets/scripts/${key}", Asset::$scripts);
        echo "\"></script>";

    }

    public static function style(string $key)
    {

        echo "<link rel=\"stylesheet\" href=\".";
        echo Asset::get("/assets/styles/${key}", Asset::$styles);
        echo "\">";

    }

    public static function image_path(string $key)
    {

        echo "." . Asset::get("/assets/images/${key}", Asset::$images);

    }

    public static function script_path(string $key)
    {

        echo "." . Asset::get("/assets/scripts/${key}", Asset::$scripts);

    }

    public static function style_path(string $key)
    {

        echo "." . Asset::get("/assets/styles/${key}", Asset::$styles);

    }

}