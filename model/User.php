<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findUserByUsername($username) {
        // Correct gebruik van de :username placeholder in execute()
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]); // Associatieve array gebruiken
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function authenticate($username, $password) {
        // Correcte methode-aanroep en case-sensitive verificatie
        $user = $this->findUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) { // password_verify correct gebruikt
            return $user;
        }
        return false;
    }
}
?>
