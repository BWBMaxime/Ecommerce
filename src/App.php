<?

namespace Wails\Core;

final class App
{

    public static function boot()
    {

        new Session();
        new Routing();

    }

}