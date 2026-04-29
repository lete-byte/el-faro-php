<?php
require_once 'models/Usuario.php';
require_once 'models/Contacto.php'; 
require_once 'controllers/UsuarioController.php';

$controller = new UsuarioController(); 
$page = $_GET['page'] ?? 'inicio';
$action = $_GET['action'] ?? '';

// formularios
if ($action == 'registrar') {
    $controller->registrar();
} elseif ($action == 'enviar_contacto') {
    $controller->procesarContacto(); 
} 
// páginas
else {
    switch ($page) {
        case 'registro':
            $controller->registro();
            break;
        case 'contacto':
            $controller->contacto();
            break;
        default:
            $controller->index();
            break;
    }
}