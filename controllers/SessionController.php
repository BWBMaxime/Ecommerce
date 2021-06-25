<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Request;
use Wails\Core\Session;
use Wails\Core\View;

final class SessionController extends Controller
{

    /**
     * Connexion
     */
    public function getLogin()
    {

        View::render('session/login', array(), 'Connexion');

    }

    /**
     * Inscription
     */
    public function getSignup()
    {

        View::render('session/signup', array(), 'Inscription');

    }

    /**
     * Connexion
     */
    public function login()
    {

        // $user = $this->getUser($_POST['TOKEN']);
        
        // if ($user) {

        //     Session::status(true);
        //     setcookie("ID", $user->id(), time()+3600);
        //     setcookie("TOKEN", $user->token(), time()+3600);

        // } else {

        //     $this->logout();

        // }

    }

    /**
     * Inscription
     */
    public function signup()
    {}

    /**
     * Déconnexion
     */
    public function logout()
    {

        Session::status(false);
        setcookie("ID", null, time()-3600);
        setcookie("TOKEN", null, time()-3600);

    }

    /**
     * Redirige l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
     */
    public static function guard()
    {

        $controller = new self();

        if ($controller->isLogged()) {

            Session::status(true);

        } else {

            Session::status(false);
            $controller->getLogin();

        };

    }

    /**
     * Vérifie si l'utilisateur est connecté
     */
    private function isLogged() : bool
    {

        setcookie('ID', '1', time()+3600);
        setcookie('TOKEN', 'v9fFLsdDjwYgZHNAaQGUrvreakSpg1PGyV3hZd', time()+3600);
        // $this->logout();

        if (Session::isSet() && isset($_COOKIE['ID']) && isset($_COOKIE['TOKEN']))
            // return ($this->checkUser('1', 'v9fFLsdDjwYgZHNAaQGUrvreakSpg1PGyV3hZd')) ? true : false;
            return ($this->checkUser($_COOKIE['ID'], $_COOKIE['TOKEN'])) ? true : false;
        return false;

    }

    private function getUser(string $token) : object|false
    {

        return $this->db->query_object("UserModel",
           "SELECT id, token
            FROM User
            WHERE token = '${token}'"
        );

    }

    private function checkUser(string $id, string $token) : object|false
    {

        return $this->db->query_object("UserModel",
           "SELECT id
            FROM User
            WHERE id = ${id}
            AND token = '${token}'"
        );

    }

}