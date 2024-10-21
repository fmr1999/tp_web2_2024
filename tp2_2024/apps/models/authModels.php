<?php

require_once './apps/models/Models.php';

class AuthModel extends Model {

        private function connect() {
            $db = new PDO('mysql:host=localhost;' . 'dbname=db_tienda_deportiva;charset=utf8', 'root', '');
            return $db;
        }


        public function getByUsername($username) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
            $query->execute([$username]);
    
            return $query->fetch(PDO::FETCH_OBJ);
        }

 }