<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\Token;
use Wails\Core\View;

final class UserController extends Controller
{

    /**
     * Afficher Profil Utilisateur
     */
    public function getUser()
    {

        SessionController::guard();
        $user = Token::get('id');
        View::render('user/profile', array(
            'user' => $this->getUserProfile($user),
            'deliveryUser' => $this->getDeliveryByUser($user),
            'paymentUser' => $this->getPaymentByUser($user),
            'orders' => $this->getOrdersByUser($user),
            'test' => $user
        ), 'Your Profile');

    }
    
    /**
     * Modifier infos profil Utilisateur
     */
    public function editUser()
    {

        // récupérer chaque valeur
        $firstname = (string) HTTP::request(true)->firstname;
        $lastname = (string) HTTP::request(true)->lastname;
        $email = (string) HTTP::request(true)->email;
        $birth = (string) HTTP::request(true)->birth;
        $phone = (string) HTTP::request(true)->phone;
        $user = Token::get('id');

        // mettre à jour l'utilisateur en base de données
        $this->updateUserProfile($user, $firstname, $lastname, $email, $birth, $phone);

        HTTP::response(200);

    }

    /**
     * Supprimer Profil Utilisateur
     */
    public function deleteUser()
    {

        // lancer la suppression de l'utilisateur
        $user = Token::get('id');
        if ($user) $this->deleteUserProfile($user);
        // repondre 200 avec un message de success ou 400 d'erreur
        HTTP::response(200);
    }

    /**
     * Afficher 1 méthode de paiement
     */
    public function getPayment()
    {

        View::render('user/payment', array(
            'payment' => $this->getPaymentMethod(Token::get('id'))
        ), 'Payment Method');

    }

    /**
     * Afficher addresses de livraison Utilisateur
     */
    public function getUserDelivery()
    {

        View::render('user/delivery', array(
            'delivery' => $this->getDeliveryMethod(Token::get('id'))
        ), 'Delivery Method');

    }

    private function getUserMin(string $id)
    {

        return $this->db->query_object('UserModel',
           "SELECT id, firstname, picture
            FROM User
            WHERE id = ${id}"
        );

    }

    private function getUserProfile(string $id)
    {

        return $this->db->query_object('UserModel',
           "SELECT id, email, firstname, lastname, birth, phone, picture, payment, delivery
            FROM User
            WHERE id = ${id}"
        );

    }

    private function getDeliveryMethod(string $id)
    {
        return $this->db->query_object('DeliveryModel',
           "SELECT id, type, country, city, zipcode, street, number, additional, user
            FROM DeliveryAddress
            WHERE id = ${id}"
        );
    }

    private function getPaymentMethod(string $id)
    {

        return $this->db->query_object('PaymentModel',
           "SELECT id, type, number, name, expiration, user
            FROM PaymentMethod
            WHERE id = ${id}"
        );

    }

    private function getDeliveryByUser(string $userId)
    {

        return $this->db->query_object('DeliveryModel',
           "SELECT id, type, country, city, zipcode, street, number, additional
            FROM DeliveryAddress
            WHERE user = ${userId}"
        );

    }

    private function getPaymentByUser(string $userId)
    {

        return $this->db->query_object('PaymentModel',
           "SELECT id, type, number, name, expiration
            FROM PaymentMethod
            WHERE user = ${userId}"
        );

    }

    private function getOrdersByUser(string $userId)
    {

        return $this->db->query_objects('CheckoutModel',
           "SELECT id, contact, bill, tracking, date, amount, state
            FROM Checkout
            WHERE user = ${userId}"
        );

    }

    private function updateUserProfile($id, $firstname, $lastname, $email, $birth, $phone)
    {

        return $this->db->query(
            "UPDATE User
            SET firstname = '${firstname}',
                lastname = '${lastname}',
                email = '${email}',
                birth = '${birth}',
                phone = '${phone}'
            WHERE id = ${id}"
        );
        
    }
    private function deleteUserProfile($id) { 
        return $this->db->query(
            "DELETE FROM User
            WHERE id = ${id}"
        );
    }

}