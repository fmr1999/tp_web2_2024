<?php

require_once 'config.php';
require_once './apps/controllers/itemsControllers.php';
require_once './apps/controllers/authControllers.php';
require_once './apps/controllers/deportesControllers.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home' : 
        $itemscontroller = new itemsController();
        $itemscontroller -> Inicio();
        break;
    case 'productoPorID':
        $itemsController = new itemsController();
        $itemsController->mostrarItemPorID($params[1]);
        break;
    case 'agregarProducto' :
        $itemscontroller = new itemsController();
        $itemscontroller -> agregarProducto();
        break;
    case 'eliminarProducto' : 
        $itemscontroller = new itemsController();
        $itemscontroller -> eliminarProducto($params[1]);     
        break;
    case 'editarProductoBoton' : 
        $itemscontroller = new itemsController();
        $itemscontroller->mostrarFormEditar($params[1]);     
        break;
    case 'editarProducto' : 
        $itemscontroller = new itemsController();
        $itemscontroller->editarProducto($params[1]);     
        break;
    case 'filtrar':
        $itemsController = new ItemsController();
        $itemsController->mostrarFiltro();
        break;

    /* deportes controller */
    case 'deportes' :
        $deportescontroller = new deportesController();
        $deportescontroller -> mostrarDeportes();
        break;
    case 'deportePorID' :
        $deportescontroller = new deportesController();
        $deportescontroller -> mostrarDeportePorID($params[1]);
        break;
    case 'agregarDeporte' :
        $deportescontroller = new deportesController();
        $deportescontroller -> agregarDeporte();
        break;
    case 'eliminarDeporte' :
        $deportescontroller = new deportesController();
        $deportescontroller -> eliminarDeporte($params[1]);
        break;
    case 'botonEditarDeporte':
        $deportescontroller = new deportesController();
        $deportescontroller->botonEditarDeporte($params[1]);
        break;
    case 'editarDeporte':
        $deportescontroller = new deportesController();
        $deportescontroller->editarDeporte($params[1]);
        break;

    /* usuario */
    case 'login':
        $authController = new authController();
        $authController->showLogin();
        break;
    case 'auth':
        $authController = new authController();
        $authController->auth();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();  
    default:
        echo "no funciona";
        break;
}




