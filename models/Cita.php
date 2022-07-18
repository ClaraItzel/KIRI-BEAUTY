<?php 
namespace Model;

class Cita extends ActiveRecord{
    //Base de datos 
    protected static $tabla='citas';
    protected static $columnasDB=['id','hora','fecha','id_usuario'];
    public $id;
    public $hora;
    public $fecha;
    public $id_usuario;

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->hora=$args['hora'] ?? "";
        $this->fecha=$args['fecha'] ?? "";
        $this->id_usuario=$args['id_usuario'] ?? "";
    }
}
?>