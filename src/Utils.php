<?

namespace Wails\Core;

final class Utils
{

    public static function pre(mixed $arg, bool $dump = false)
    {

        echo "<pre>";
        Utils::log($arg, $dump);
        echo "</pre>";

    }

    public static function log(mixed $arg, bool $dump = false)
    {

        ($dump) ? var_dump($arg) : print_r($arg);

    }

    public static function unserialize(string $path, bool $assoc = false) : mixed
    {

        return json_decode(file_get_contents($path), $assoc);

    }

    public static function serialize(string $filename, mixed $value) : bool
    {

        return file_put_contents($filename, json_encode($value));

    }

    public static function array_check(array $subject) : bool
    {

        return !in_array(false, $subject);

    }

    public static function array_subkeys(array $subject) : array
    {

        return array_map(
            function ($e) { return array_keys($e); },
            array_filter($subject,
                function ($e) { return is_array($e); }
            )
        );

    }

    public static function preg(string $pattern, mixed $subject) : bool
    {

        return match (gettype($subject)) {
            "string" => preg_match($pattern, $subject),
            "array", "object" => match (count($subject)) {
                0 => true,
                default => self::array_check(
                    array_map(function($e) use ($pattern) {
                        return self::preg($pattern, $e);
                    }, match (gettype($subject)) {
                        "array" => $subject,
                        "object" => get_object_vars($subject)
                    })    
                )
            },
            default => false
        };

    }

}