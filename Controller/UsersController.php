<?php

namespace Controller;

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

use Model\Users;
use Exception;

class UsersController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    // REGISTRO DE USUÁRIO
    public function createUser($name, $email, $password) :bool {
        if (empty($name) || empty($email) || empty($password)) {
            return false;
        }
            
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
        try {
            return $this->userModel->registerUser($name, $email, $hashedPassword);
        } catch (Exception $e) {
            throw new Exception(
                'Erro ao criar usuário',
                0,
                $e
            );
        }
    }

    public function checkUserByEmail($email) :array {
        return $this->userModel->getUserByEmail($email);
    }

    public function login($email, $password) :bool {
        try {
            $user = $this->userModel->getUserByEmail($email);
        } catch (Exception $e) {
            throw new Exception(
                'Erro ao selecionar usuário por email',
                0,
                $e
            );
        }
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() :?int {
        return isset($_SESSION['id']);
    }

    public function getUserData($id, $name, $email) :array {
        try {
            return $this->userModel->getUserInfo($id, $name, $email);
        } catch (Exception $e) {
            throw new Exception(
                'Erro ao selecionar dados do usuário',
                0,
                $e
            );
        }
    }
}

?>