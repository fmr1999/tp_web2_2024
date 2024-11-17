<?php

require_once './apps/models/Models.php';

class AuthModel extends Model {

    
        public function getByUsername($username) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
            $query->execute([$username]);
    
            return $query->fetch(PDO::FETCH_OBJ);
        }

 }