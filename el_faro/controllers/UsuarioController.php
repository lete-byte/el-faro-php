<?php
class UsuarioController {
    
    // Método para la página de inicio 
    public function index() {
        require_once 'views/home.php';
    }

    // Muestra el formulario de registro 
    public function registro() {
        require_once 'views/registro.php';
    }

    // registra usando POO 
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = htmlspecialchars($_POST['nombre']);
            $email = htmlspecialchars($_POST['email']);
            $plan = $_POST['plan'] ?? 'Básico';
            
            $nuevoUsuario = new Usuario($nombre, $email, $plan);
            $mensaje = $nuevoUsuario->registrar();
            
            require_once 'views/home.php';
            echo "<div class='notification is-success'>$mensaje</div>";
        }
    }

    // Muestra el formulario de contacto 
    public function contacto() {
        require_once 'views/contacto.php';
    }

    // Procesa el formulario de contacto
    public function procesarContacto() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = htmlspecialchars($_POST['nombre']);
        $texto = htmlspecialchars($_POST['mensaje']);
        
        $msg = new Contacto($nombre, $texto);
        $resultado = $msg->enviar();
        
        require_once 'views/home.php';
        echo "<div class='notification is-info'>$resultado</div>";
    }
    }
}