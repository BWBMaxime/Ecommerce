<?

namespace Wails\Core;
use PDO;

final class Database
{

    private object $pdo;

    public function __construct()
    {

        $config = Config::get("database");
        $this->pdo = new PDO(
            "{$config->driver}:dbname={$config->name};host={$config->host}:{$config->port}",
            "{$config->user}", "{$config->pass}"
        );

    }

    public function lastID()
    {

        return $this->pdo->lastInsertId();

    }

    public function query(string $query) : object|false
    {

        return $this->pdo->query($query);

    }

    public function query_file(string $file) : object|false
    {

        return $this->query(file_get_contents($file));

    }

    public function query_default(string $query) : mixed
    {

        return $this->query($query)->fetch();

    }

    public function query_array(string $query) : array|false
    {

        return $this->query($query)->fetch(PDO::FETCH_ASSOC);

    }

    public function query_arrays(string $query) : array|false
    {

        return $this->query($query)->fetchAll(PDO::FETCH_ASSOC);

    }

    public function query_object(string $class, string $query) : object|false
    {

        return $this->query($query)->fetchObject("\\Wails\\Models\\${class}");

    }

    public function query_objects(string $class, string $query) : array|false
    {

        return $this->query($query)->fetchAll(PDO::FETCH_CLASS, "\\Wails\\Models\\${class}");

    }

    public function query_result(string $query) : mixed
    {

        return $this->query_array($query)['result'];

    }

}