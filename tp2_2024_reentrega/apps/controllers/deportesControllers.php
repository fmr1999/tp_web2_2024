<?php

require_once './apps/models/deportesModels.php';
require_once './apps/views/deportesViews.php';


class deportesController{

    private $model;
    private $view;

    function __construct(){
        AuthHelper::init();
        $this->model = new deporteModels();
        $this->view = new deporteView();
    }

    function mostrarDeportes(){
        
        $deportes = $this->model->obtenerDeportes();
        $this->view->mostrarDeportes($deportes);
    }

    function mostrarDeportePorID($id){
        $deporteporid = $this->model->deportePorID($id);
        $this->view->mostrarDeporte($deporteporid);
    }

    function agregarDeporte(){
        AuthHelper::verify();

        $deporte = $_POST['deporte'];

        if(empty($deporte)){
            $this->view->showError("Completar el campo");
            return;
        }

        $id = $this->model->insertarDeporte($deporte);
        
        if ($id) {
            header('Location: ' . BASE_URL . "/deportes");
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }

    function eliminarDeporte($id){
        AuthHelper::verify();

        try {        
            $this->model->quitarDeporte($id);
            header('Location: ' . BASE_URL . "deportes");
        } catch (PDOException) {
            $this->view->showError(' error al eliminar un deporte');
        }

    }

    function botonEditarDeporte($id) {
        AuthHelper::verify();
        $deporte = $this->model->obtenerDeporte($id);

        $this->view->mostrarEditForm($deporte);
    }

    function editarDeporte($id) {
        AuthHelper::verify();
        $deporte = $_POST['deporte'];

        if (empty($deporte)) {
            $this->view->showError("Faltan completar campos");
            return;   
        }

        $this->model->editarDeporte($id, $deporte);
        header('Location: ' . BASE_URL . "deportes");
    }    
}

?>