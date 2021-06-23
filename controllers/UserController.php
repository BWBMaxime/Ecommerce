<?

namespace Wails\Controllers;
use Wails\Core\Controller;
use Wails\Core\View;

final class UserController extends Controller
{

    /**
     * Afficher Profil Utilisateur
     */
    public function getUserProfile()
    {
        
        View::render('user/profile', array(
            'user' => $this->getUser(1)
        ), 'Your Profile');

    }
    
    /**
     * Modifier infos profil Utilisateur
     */
    public function editUserProfile()
    {}

    /**
     * Supprimer Profil Utilisateur
     */
    public function deleteUserProfile()
    {}

    /**
     * Afficher méthodes de paiement Utilisateur
     */
    public function getUserPayment()
    {}

    /**
     * Ajouter méthode de paiement Utilisateur
     */
    public function addUserPayment()
    {}

    /**
     * Modifier méthodes de paiement Utilisateur
     */
    public function editUserPayment()
    {}

    /**
     * Supprimer méthode de paiement Utilisateur
     */
    public function deleteUserPayment()
    {}

    /**
     * Afficher addresses de livraison Utilisateur
     */
    public function getUserDelivery()
    {}

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

}