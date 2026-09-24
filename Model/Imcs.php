<?php

namespace Model;
use PDOException;
use Model\Connection;
class Imcs {
    private $db;
    public function __construct() {
        $this->db = Connection::getInstance();
    }
    public function createImc(
        float $weight,
        float $height,
        float $result,
        int $user_id
    ) :bool {
        try {
            $sql = 'INSERT INTO imcs (weight, height, result, created_at, user_id) VALUES (:weight, :height, :result, NOW(), :user_id)';
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':weight' => $weight,
                ':height' => $height,
                ':result' => $result,
                ':user_id' => $user_id
            ]);
        } catch (PDOException $e) {
            throw new PDOException(
                'Erro ao criar IMC',
                0,
                $e
            );
        }
    }
}

?>