<?

namespace Wails\Core;

final class Scripts
{

    public static function db_create()
    {
    
        $db = new Database();
        $file = __DIR__ . "/../database/Schema.sql";

        if (is_file($file)) $db->query_file($file);
    
    }

    public static function db_seed()
    {
    
        $db = new Database();
        $folder = __DIR__ . "/../database/seed";

        foreach (scandir($folder) as $file)
        {

            if (is_file("${folder}/${file}")) $db->query_file("${folder}/${file}");

        }
    
    }


}