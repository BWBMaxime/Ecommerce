<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Provider;
use Wails\Core\Session;
use Wails\Core\Token;
use Wails\Core\View;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;


final class SessionController extends Controller
{

    /**
     * Connexion / Redirection vers OpenID
     */
    public function login()
    {
        
        Session::setURL();
        View::redirect((self::isLogged()) ? '/user' : Provider::url('microsoft'));

    }

    /**
     * Redirection une fois la connexion validée
     */
    public function auth()
    {

        try {

            $user = Provider::Microsoft();
            Token::encode(array(
                'id' => $user->getId(),
                'mail' => $user->getMail()
            ));
            Session::status(true);
            View::redirect(Session::getURL());

        } catch(IdentityProviderException $error) {
            
            Error::provider($error);

        }

    }

    /**
     * Déconnexion
     */
    public function logout()
    {

        Session::setURL();
        Session::status(false);
        Cookie::unset('TOKEN');
        HTTP::response(200, '/');

    }

    /**
     * Redirige l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
     */
    public static function guard()
    {

        Session::setURL();
        View::redirect((self::isLogged()) ? Session::setURL() : '/session');





        // $controller = new self();

        // if ($controller->isLogged()) {

        //     Session::status(true);

        // } else {

        //     Session::status(false);
        //     $controller->login();

        // };

    }

    /**
     * Vérifie si l'utilisateur est connecté
     */
    private static function isLogged() : bool
    {

        return (Session::isSet() && Token::isSet() && Session::isLogged()) ? true : false;

    }

    // private function getUser(string $token) : object|false
    // {

    //     return $this->db->query_object("UserModel",
    //        "SELECT id, token
    //         FROM User
    //         WHERE token = '${token}'"
    //     );

    // }

    // private function checkUser(string $id, string $token) : object|false
    // {

    //     return $this->db->query_object("UserModel",
    //        "SELECT id
    //         FROM User
    //         WHERE id = ${id}
    //         AND token = '${token}'"
    //     );

    // }

}