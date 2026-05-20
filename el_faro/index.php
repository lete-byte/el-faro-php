<?php
// 1. Carga de forma obligatoria los modelos y componentes necesarios
require_once 'models/Usuario.php';
require_once 'models/Contacto.php';
require_once 'controllers/UsuarioController.php';

// 2. Instancia controlador central del patrón MVC
$controller = new UsuarioController();

// 3. Sistema de Enrutamiento (Front Controller) para solicitudes de procesamiento (POST)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === 'registrar') {
        $controller->registrar();
    } elseif ($action === 'enviar_contacto') {
        $controller->procesarContacto();
    } else {
        $controller->index();
    }
} 
// 4. Sistema de Enrutamiento para navegación de vistas estáticas (GET)
else {
    $page = $_GET['page'] ?? 'home';

    if ($page === 'registro') {
        $controller->registro();
    } elseif ($page === 'contacto') {
        $controller->contacto();
    } else {
        $controller->index();
    }
}