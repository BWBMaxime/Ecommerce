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
            
            if ($user) {

                $this->setUserProfile($user);
                Session::status(true);
                View::redirect((Session::getURL()));

            } else {

                View::redirect('/');

            }

        } catch(IdentityProviderException $error) {
            
            Error::provider($error);

        }

    }

    /**
     * Déconnexion
     */
    public static function logout()
    {

        Session::status(false);
        session_destroy();
        Cookie::unset('TOKEN');
        HTTP::response(200, '/');

    }

    /**
     * Redirige l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
     */
    public static function guard()
    {

        Session::setURL();
        if (!self::isLogged()) View::redirect('/session');

    }

    /**
     * Vérifie si l'utilisateur est connecté
     */
    private static function isLogged() : bool
    {

        return (Session::isSet() && Token::isSet() && Session::isLogged()) ? true : false;

    }

    private function setUserProfile(object $user)
    {

        list($obj, $id) = $this->getCurrentUser($user->getId());
        
        if (!$obj) {

            $id = $this->setCurrentUser($user);
            Token::encode(array(
                'id' => $id,
                'token' => $user->getId(),
                'email' => $user->getMail()
            ));

        } else {

            Token::encode(array(
                'id' => $obj->id(),
                'token' => $obj->token(),
                'email' => $obj->email()
            ));

        }

    }

    private function getCurrentUser(string|int $token) : array
    {

        return array($this->db->query_object("UserModel",
           "SELECT id, token, email
            FROM User
            WHERE token = '${token}'"
        ), $this->db->lastID());

    }

    private function setCurrentUser(object $user) : string|array
    {

        $token = $user->getId();
        $email = $user->getMail();

        $this->db->query(
           "INSERT INTO User (token, email)
            VALUES ('${token}', '${email}')"
        );

        return $this->db->lastID();

    }

    private static function sanitize(mixed $target, mixed $alternative) : mixed
    {

        return (isset($target) && $target !== null && $target !== false) ? $target : $alternative;

    }

}