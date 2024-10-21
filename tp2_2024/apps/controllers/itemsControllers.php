<?php


require_once './apps/models/itemsModels.php';
require_once './apps/views/itemsViews.php';
require_once './apps/models/deportesModels.php';


class itemsController{

    private $model;
    private $view;

    public function __construct(){
        AuthHelper::init();

        $this->model =  new itemsModel();
        $this->view =  new itemsView();   
    }

    function Inicio(){
        
        $productos = $this->model->obtenerProductos();

        $deportes = new deporteModels();
        $deportes = $deportes->obtenerDeportes();

        $this->view->viewHome($productos , $deportes);

    }

    function agregarProducto() {
        AuthHelper::verify();
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $deporte = $_POST['id_deporte'];  
    
        if (empty($nombre) || empty($precio) || empty($color) || empty($deporte)) {
            $this->view->showError("Completar todos los campos");
            return;
        }
    
        $id = $this->model->insertarProducto($nombre, $precio, $color, $deporte);
        
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }
    
    function eliminarProducto($id){
        AuthHelper::verify();
        $this->model->quitarProducto($id);
        header('Location: ' . BASE_URL);
    }

    function editarProducto($id) {
        AuthHelper::verify();

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $id_deporte = $_POST['deporte'];
    
        $this->model->editProducto($id, $nombre, $precio, $color, $id_deporte);
        header("Location: " . BASE_URL);
    }

    function mostrarFormEditar($id) {
        $producto = $this->model->obtenerProducto($id);
        $deportes = new deporteModels();
        $deportes = $deportes->obtenerDeportes();

        if ($producto){
            $this->view->mostrarFormEditar($producto, $deportes);
        } else {
            $this->view->showError("Producto no encontrado.");
        }
    }

    function mostrarFiltro() {
        AuthHelper::verify();
        $filtro = $_POST['deporte'];
        if (isset($filtro)) {
            $productos = $this->model->obtenerProductoFiltro($filtro);
            if (empty($productos)) {
                $this->view->showError('No existe deporte de dicho producto');
            } else {
                $this->view->mostrarFiltrado($productos);
            }
        }
    }
    
}


    
    
    
    
        



