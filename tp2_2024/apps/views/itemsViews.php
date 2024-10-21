<?php

class itemsView{
    
    function viewHome($productos , $deportes) {
        require_once './templates/header.phtml';
        require_once './templates/home.phtml';
        require_once './templates/footer.phtml';
    }

    function showError($error){
        require_once './templates/header.phtml';
        require_once './templates/error.phtml';
        require_once './templates/footer.phtml';
    }

    
    function mostrarFormeditar($producto, $deportes) {
            require_once './templates/header.phtml';
            require_once './templates/formEditproducto.phtml';
            require_once './templates/footer.phtml';
    
    }
    
    function mostrarFiltrado($productos) {
        require_once './templates/header.phtml';
        require_once './templates/filtroPorProductos.phtml';
        require_once './templates/footer.phtml';
    }


}