<?

namespace Wails\Core;

final class Script
{

    public static function new_controller($event)
    {
    
        if (count($event->getArguments()) < 1) Error::script(1);

        foreach ($event->getArguments() as $param)
        {

            file_put_contents(
                __DIR__ . "/../controllers/${param}Controller.php",
                <<<EOT
                <?

                namespace Wails\Controllers;
                use Wails\Core\Controller;
                use Wails\Core\Cookie;
                use Wails\Core\Error;
                use Wails\Core\HTTP;
                use Wails\Core\Session;
                use Wails\Core\View;
                
                final class ${param}Controller extends Controller
                {}
                EOT
            );

        }
    
    }

    public static function new_model($event)
    {
    
        if (count($event->getArguments()) < 1) Error::script(1);

        foreach ($event->getArguments() as $param)
        {

            file_put_contents(
                __DIR__ . "/../models/${param}Model.php",
                <<<EOT
                <?
                
                namespace Wails\Models;
                use Wails\Core\Model;
                
                final class ${param}Model extends Model
                {}
                EOT
            );

        }
    
    }

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