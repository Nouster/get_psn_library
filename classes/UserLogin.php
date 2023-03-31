<?php

namespace App;

use Exception;
use PDO;

class UserLogin
{
    public PDO $pdo;
    private string $pseudo;
    private string $pass;

    public function __construct(string $pseudo, string $pass, PDO $pdo)
    {
        $this->pseudo = $pseudo;
        $this->pass = $pass;

        $stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo_users = :username');

        $stmt->execute([
            ':username' => $pseudo,
        ]);

        if ($pass === false) {
            throw new Exception('Mot de passe incorrect');
        }

        $userFound = $stmt->fetch();

        if ($userFound && password_verify($pass, $userFound['pass_users'])) {
            $_SESSION['isConnected'] = true;
            $_SESSION ['user_id'] = $userFound['id_users'];
            redirect('index.php');
        } else {
            redirect('login.php?error=' . AuthentificationError::PASS_PSEUDO_INVALID);
        }
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPass()
    {
        return $this->pass;
    }
}
