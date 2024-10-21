<?php

class deporteModels{
    private $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;dbname=db_tienda_deportiva;charset=utf8', 'root', '');
        return $db;
    }


    function obtenerDeportes(){
        $query = $this->db->prepare('SELECT * FROM deportes');
        $query->execute();
        $deportes = $query->fetchAll(PDO::FETCH_OBJ);
        return $deportes;
    }

    function insertarDeporte($deporte){
        $query = $this->db->prepare('INSERT INTO deportes(nombre) VALUES (?)');
        $query->execute([$deporte]);

        return $this->db->lastInsertId();
    }

    function quitarDeporte($id){
        $query = $this->db->prepare('DELETE FROM deportes WHERE id_deporte = ?');
        $query->execute([$id]);
        
    }

    function obtenerDeporte($id) {
        $query = $this->db->prepare('SELECT * FROM deportes WHERE id_deporte = ?');
        $query->execute([$id]);

        $deporte = $query->fetch(PDO::FETCH_OBJ);

        return $deporte;
    }

    

    function editarDeporte($id, $deporte) {
        $query = $this->db->prepare('UPDATE deportes SET nombre = ? WHERE id_deporte = ? ');
        $query->execute([$deporte, $id]);
    }

}

?>
