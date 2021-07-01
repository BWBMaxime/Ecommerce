<?

namespace Wails\Core;

abstract class Controller
{

    protected object $db;

    public final function __construct()
    {

        $this->db = new Database();

    }

}