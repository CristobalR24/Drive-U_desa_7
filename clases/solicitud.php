<?php
class Solicitud{
    public $id_solicitante;
    public $inicio_destino;
    public $estado;
    public $razon;
    public $telefono;
    public $diaviaje;
    public $correo_electronico;
    public $tipo_vehiculo;
    public $id_vehiculo;
    public $final_destino;

    function __construct($id_solicitante,$inicio_destino,$estado,$razon,$telefono,$diaviaje,$correo_electronico,$tipo_vehiculo,$id_vehiculo,$final_destino){
        $this->id_solicitante = $id_solicitante;
        $this->inicio_destino = $inicio_destino;
        $this->estado = $estado;
        $this->razon = $razon;
        $this->telefono =$telefono;
        $this->diaviaje = $diaviaje;
        $this->correo_electronico = $correo_electronico;
        $this->tipo_vehiculo = $tipo_vehiculo;
        $this->id_vehiculo = $id_vehiculo;
        $this->final_destino = $final_destino;
    }
}
?>