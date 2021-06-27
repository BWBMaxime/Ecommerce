<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\Cookie;
use Wails\Core\Error;
use Wails\Core\HTTP;
use Wails\Core\Session;
use Wails\Core\View;

final class UserController extends Controller
{

    /**
     * Afficher Profil Utilisateur
     */
    public function getUserProfile()
    {
        View::render('user/profile', array(
            'user' => $this->getUser(5),
            'deliveryUser' => $this->getDeliveryByUser(5),
            'paymentUser' => $this->getPaymentByUser(5),
            'order' => $this->getOrderByUser(5)
        ), 'Your Profile');
    }

    
    /**
     * Modifier infos profil Utilisateur
     */
    public function editUserProfile()
    {
        // récupérer chaque valeur
        $firstname = (string) HTTP::request(true)->firstname;
        $lastname = (string) HTTP::request(true)->lastname;
        $email = (string) HTTP::request(true)->email;
        $birth = (string) HTTP::request(true)->birth;
        $phone = (string) HTTP::request(true)->phone;
        //$id = $_SESSION['user'];
        $id = 5;

        // mettre à jour l'utilisateur en base de données
        $result = $this->updateUser($id, $firstname, $lastname, $email, $birth, $phone);
        // repondre 200 avec un message de success ou 500 d'erreur
        $httpCodeResponse = 200;
        if ($result == false) {
            $httpCodeResponse = 500;
        } else {
            $result = ["status" => "success"];
        }

        HTTP::response($httpCodeResponse, $result, true);
    }

    /**
     * Supprimer Profil Utilisateur
     */
    public function deleteUserProfile()
    {}

    /**
     * Afficher 1 méthode de paiement
     */
    public function getPayment()
    {
        View::render('user/payment', array(
            'payment' => $this->getPaymentMethod(1)
        ), 'Payment Method');
    }

    /**
     * Afficher addresses de livraison Utilisateur
     */
    public function getUserDelivery()
    {
        View::render('user/delivery', array(
            'delivery' => $this->getDeliveryMethod(1)
        ), 'Delivery Method');
    }

    /**
     * Ajouter addresse de livraison Utilisateur
     */
    public function addUserDelivery()
    {}

    /**
     * Modifier addresses de livraison Utilisateur
     */
    public function editUserDelivery()
    {}

    /**
     * Supprimer addresse de livraison Utilisateur
     */
    public function deleteUserDelivery()
    {}



    private function getUserMin(string $id)
    {

        return $this->db->query_object('UserModel',
           "SELECT id, firstname, picture
            FROM User
            WHERE id = ${id}"
        );

    }

    private function getUser(string $id)
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
    private function getOrderByUser(string $userId)
    {
        return $this->db->query_object('CheckoutModel',
           "SELECT id, contact, bill, tracking, date, amount, state
            FROM Checkout
            WHERE user = ${userId}"
        );
    }
    private function updateUser($id, $firstname, $lastname, $email, $birth, $phone) { 
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

}