<?php 

class itemsModel {
    
    private $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;dbname=db_tienda_deportiva;charset=utf8', 'root', '');
        return $db;
    }

    function obtenerProducto($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
        
    }
    

    function obtenerProductos() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    function insertarProducto($nombre, $precio, $color , $deporte){
        $query = $this->db->prepare('INSERT INTO productos(nombre, precio, color , id_deporte) VALUES (?,?,?,?)');
        $query->execute([$nombre, $precio, $color , $deporte]);
        
        return $this->db->lastInsertId();

    }

    function quitarProducto($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto  = ?');
        $query->execute([$id]);
    }

    function editProducto($id, $nombre, $precio, $color , $id_deporte){
        $query = $this->db->prepare('UPDATE productos SET nombre=?, precio=?, color=?, id_deporte=? WHERE id_producto = ?' );
        $query->execute([$nombre, $precio, $color , $id_deporte, $id]);
    }
    
    

    function obtenerProductoFiltro($filtro){
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_deporte = ?');
        $query->execute([$filtro]);

        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
}
