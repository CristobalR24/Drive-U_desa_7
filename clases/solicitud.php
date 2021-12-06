<?php
class Solicitud{
    public $id_solicitante;
    public $inicio_destino;
    public $estado;
    public $razon;
    public $telefono;
    public $diaviaje;
    public $cantida_personas;
    public $correo_electronico;
    public $id_vehiculo;
    public $final_destino;


    function __construct($id_solicitante,$inicio_destino,$estado,$razon,$telefono,$diaviaje ,$cantida_personas,$correo_electronico,$id_vehiculo,$final_destino){
        $this->id_solicitante = $id_solicitante;
        $this->inicio_destino = $inicio_destino;
        $this->estado = $estado;
        $this->razon = $razon;
        $this->telefono =$telefono;
        $this->cantida_personas = $cantida_personas;
        $this->diaviaje = $diaviaje;
        $this->correo_electronico = $correo_electronico;
        $this->id_vehiculo = $id_vehiculo;
        $this->final_destino = $final_destino;
    }
   
}
?>
