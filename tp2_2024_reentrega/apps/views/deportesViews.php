<?php 

class deporteView{

    function mostrarDeportes($deportes){
        require_once './templates/header.phtml';
        require_once './templates/homeDeportes.phtml';
        require_once './templates/footer.phtml';

    }

    function mostrarDeporte($deporteporid){
        require_once './templates/header.phtml';
        require_once './templates/deporteporid.phtml';
        require_once './templates/footer.phtml';
    }

    
    function showError($error){
        require_once './templates/header.phtml';
        require_once './templates/error.phtml';
        require_once './templates/footer.phtml';
    }

    function mostrarEditForm($deporte) {
        require_once './templates/header.phtml';
        require_once './templates/formEditDeportes.phtml';
        require_once './templates/footer.phtml';

    }

}






?>