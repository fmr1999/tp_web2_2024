<?php

require_once './apps/models/Models.php';

class deporteModels extends Model {
    

    function obtenerDeportes(){
        $query = $this->db->prepare('SELECT * FROM deportes');
        $query->execute();
        $deportes = $query->fetchAll(PDO::FETCH_OBJ);
        return $deportes;
    }

    function deportePorID($id){
        $query = $this->db->prepare('SELECT * FROM deportes WHERE id_deporte = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
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
