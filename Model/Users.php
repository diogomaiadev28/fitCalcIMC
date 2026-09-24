<?php
namespace Model;

use Model\Connection;

use PDO;
use PDOException;
class Users {
    private $db;
    public function __construct(){
        $this->db = Connection::getInstance();
    }
    public function registerUser(
        string $name,
        string $email,
        string $password
    ) :bool {
        try {
            $sql = 'INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())';
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $password
            ]);
        } catch (PDOException $e) {
            throw new PDOException(
                'Erro ao registrar usuário',
                0,
                $e
            );
        }
    }
    
    public function getUserByEmail($email) :array {
        try {
            $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException(
                'Erro ao selecionar usuário por email',
                0,
                $e
            );
        }
    }

    public function getUserInfo($id, $name, $email) :array {
        try {
            $sql = 'SELECT name, email FROM users WHERE  id = :id AND name = :name AND email = :email';
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':email' => $email
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException(
                'Erro ao selecionar informações do usuário',
                0,
                $e
            );
        }
    }
}
?>