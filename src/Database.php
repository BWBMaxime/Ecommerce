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

    public function query(string $query) : object
    {

        return $this->pdo->query($query);

    }

    public function query_file(string $file) : object
    {

        return $this->pdo->query(file_get_contents($file));

    }

    public function query_array(string $query) : array
    {

        return $this->query($query)->fetch(PDO::FETCH_ASSOC);

    }

    public function query_arrays(string $query) : array
    {

        return $this->query($query)->fetchAll(PDO::FETCH_ASSOC);

    }

    public function query_object(string $class, string $query) : object
    {

        return $this->query($query)->fetchObject($class);

    }

    public function query_objects(string $class, string $query) : object
    {

        return $this->query($query)->fetchAll(PDO::FETCH_CLASS, $class);

    }

}