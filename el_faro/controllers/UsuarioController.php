<?php
// Excepción personalizada para el control de reglas de negocio en el Backend
class ValidacionException extends Exception {}

class UsuarioController {
    
    // Página de inicio
    public function index() {
        require_once 'views/home.php';
    }

    // Muestra el formulario de registro
    public function registro() {
        require_once 'views/registro.php';
    }

    // Procesa el registro usando POO y manejo defensivo de excepciones
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                // Sanitización de datos de entrada
                $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
                $email = trim(htmlspecialchars($_POST['email'] ?? ''));
                $plan = $_POST['plan'] ?? 'Básico';

                // Validación estricta en el Servidor (Última línea de defensa)
                if (empty($nombre) || empty($email)) {
                    throw new ValidacionException("Todos los campos son obligatorios.");
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new ValidacionException("La dirección de correo electrónico no tiene un formato válido.");
                }

                // Invoca el modelo original de la Semana 6
                $nuevoUsuario = new Usuario($nombre, $email, $plan);
                $mensajeExito = $nuevoUsuario->registrar();
                
                // Carga la vista de éxito
                require_once 'views/registro.php';

            } catch (ValidacionException $e) {
                $errorMsg = $e->getMessage();
                $code = "registro_error";
                require_once 'views/registro.php';
            } catch (Exception $e) {
                $errorMsg = "Error inesperado en el sistema.";
                require_once 'views/registro.php';
            }
        }
    }

    // Muestra el formulario de contacto
    public function contacto() {
        require_once 'views/contacto.php';
    }

    // Procesa el formulario de contacto con bloque seguro Try/Catch/Finally
    public function procesarContacto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conexionActiva = true; // Simulación de recurso de red
            try {
                // Sanitización de datos
                $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
                $texto = trim(htmlspecialchars($_POST['mensaje'] ?? ''));

                if (empty($nombre) || empty($texto)) {
                    throw new ValidacionException("Por favor, rellena todos los campos.");
                }

                if (strlen($texto) < 10) {
                    throw new ValidacionException("El mensaje es demasiado corto (mínimo 10 caracteres).");
                }

                // Invoca el modelo original de Contacto
                $msg = new Contacto($nombre, $texto);
                $mensajeExito = $msg->enviar();
                
                require_once 'views/contacto.php';

            } catch (ValidacionException $e) {
                $errorMsg = $e->getMessage();
                $code = "contacto_error";
                require_once 'views/contacto.php';
            } catch (Exception $e) {
                $errorMsg = "Error en el servidor de correo.";
                require_once 'views/contacto.php';
            } finally {
                // Garantiza la liberación de recursos siempre
                $conexionActiva = null;
            }
        }
    }
}