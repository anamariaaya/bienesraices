<?php

namespace App;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = 'Añade un Nombre';
        }

        if(!$this->apellido){
            self::$errores[] = 'Añade un Apellido';
        }

        if(!$this->telefono){
            self::$errores[] = 'Añade un Teléfono';
        }

        //Valida que sean números del 0 al 9 y con una longitud de 9 caracteres
        if(!preg_match('/[0-9]{9}/', $this->telefono)){
            self::$errores[] = 'Agrega un teléfono válido';
        }

        return self::$errores;
    }
}
