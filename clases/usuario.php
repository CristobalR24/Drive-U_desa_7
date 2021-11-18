<?php
class Usuario{
    public $nombre;
    public $facultad;
    public $cedula;
    public $password;
    public $tipo;

    function __construct($n,$f,$c,$p,$f,$t){
        $this->nombre = $n;
        $this->facultad = $f;
        $this->cedula = $c;
        $this->password = $p;
        $this->tipo=$t;
    }
}
?>