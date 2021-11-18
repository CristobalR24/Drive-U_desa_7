<?php
class Vehiculo{
    public $estado;
    public $modelo;
    public $capacidad;
    public $placa;
    public $marca;

    function __construct($estado,$modelo,$capacidad,$placa,$marca){
        $this->estado = $estado;
        $this->modelo = $modelo;
        $this->capacidad = $capacidad;
        $this->placa = $placa;
        $this->marca=$marca;
    }
}
?>