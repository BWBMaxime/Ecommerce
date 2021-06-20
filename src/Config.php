<?

namespace Wails\Core;

final class Config
{

    public static function get(string $filename, bool $assoc = false) : mixed
    {
        
        return Utils::unserialize(__DIR__."/config/${filename}.json", $assoc);
    
    }

    public static function is_routes(array $subject)
    {

        return Utils::array_check([
            Utils::preg('/^[a-z0-9-_]+::[a-z0-9-_]+$/i', $subject),
            Utils::preg('/^(\/|(\/([a-z0-9-_]+|{[a-z0-9-_]+}))+)(\/)?$/i', array_keys($subject)),
            Utils::preg('/^(GET|HEAD|POST|PUT|PATCH|DELETE)$/', Utils::array_subkeys($subject))
        ]);

    }

}