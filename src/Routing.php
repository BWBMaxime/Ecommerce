<?

namespace Wails\Core;
use ReflectionMethod;

final class Routing
{

    private array $routes;
    private array $request;

    public function __construct()
    {

        $this->routes = Config::get('routes', true);
        $this->request = array(
            'HTTP' => $_SERVER['REQUEST_METHOD'],
            'URI' => self::sanitize($_SERVER['REQUEST_URI'])
        );
        (Config::is_routes($this->routes)) ?
            $this->process() : Error::syntax('config.json');

    }

    private static function split(string $subject) : array
    {

        return preg_split('/\//i', $subject);

    }

    private static function compare(array $subject, array $other) : bool
    {

        return Utils::preg('/^{[a-z0-9-_]+}$/i', array_diff_assoc($subject, $other))
            && count($subject) == count($other);

    }

    private static function sanitize(string $subject) : string
    {

        return (Utils::preg('/^.+(\/$|\/\?.*$|\?.*$)/i', $subject)) ?
            preg_replace('/(?!^)(\/$|\/\?.*$|\?.*$)/i', '', $subject) : $subject;

    }
    
    private static function params(string $subject, string $route) : array
    {

        return array_diff_assoc(self::split($subject), self::split($route));

    }

    private static function route(string $subject, array $routes) : string
    {

        $subjects = self::split($subject);

        foreach (array_keys($routes) as $key) {

            if (self::compare(self::split($key), $subjects)) return $key;

        }

        Error::status(404);

    }

    private static function controller(string|array $subject, string $http) : array
    {

        return match (gettype($subject))
        {
            'string' => match ($http)
            {
                'GET' => preg_split('/::/i', $subject),
                default => Error::http($subject, $http)
            },
            default => match (array_key_exists($http, $subject))
            {
                true => preg_split('/::/i', $subject[$http]),
                default => Error::http($subject[$http], $http)
            }
        };

    }

    private static function invoke(string $class, string $method, array $params = [])
    {

        if (method_exists($class, $method)) {

            $reflector = new ReflectionMethod($class, $method);
            $reflector->invoke(($reflector->isStatic()) ? null : new $class(), ...$params);

        } else {

            Error::method($class, $method);

        };

    }

    private function process()
    {

        $route = self::route($this->request['URI'], $this->routes);
        $params = self::params($this->request['URI'], $route);
        list($class, $method) = self::controller($this->routes[$route], $this->request['HTTP']);
        self::invoke("\\Wails\\Controllers\\{$class}", $method, $params);

    }

}