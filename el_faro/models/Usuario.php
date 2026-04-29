<?php
class Usuario {
    public $nombre;
    public $email;
    public $plan;

    public function __construct($nombre, $email, $plan = 'Básico') {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->plan = $plan;
    }

    public function registrar() {
        return "Usuario {$this->nombre} registrado con éxito en el plan {$this->plan}.";
    }
}