<?php
class Contacto {
    public $nombre;
    public $mensaje;

    public function __construct($nombre, $mensaje) {
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    public function enviar() {
        // simula el envío
        return "Mensaje de {$this->nombre} recibido correctamente.";
    }
}