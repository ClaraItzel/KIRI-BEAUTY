<?php 
namespace Model;

class Servicio extends ActiveRecord{
    protected static $tabla ='servicios';
    protected static $columnasDB =['id','servicio','precio'];

    public $id;
    public $servicio;
    public $precio;

    public function __construct($args=[])
    {
    $this->id= $args['id'] ?? null;
    $this->servicio= $args['servicio'] ?? null;
    $this->precio= $args['precio'] ?? null;
    }
    public function validar(){
        if (!$this->servicio) {
            self::$alertas['error'][]="Tienes que poner el nombre del servicio";
        }
        if (!$this->precio) {
            self::$alertas['error'][]="Tienes que poner un precio a tu servicio";
        }
        if (!is_numeric($this->precio)) {
            self::$alertas['error'][]="El precio no es válido";
        }
        return self::$alertas;
    }
}
?>