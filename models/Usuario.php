<?php 
namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos
    public static $tabla= 'usuarios';
    protected static $columnasDB= ['id', 'nombre','apellido','telefono','email','password','admin','confirmado','token'];
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args=[]){
        $this->id= $args['id'] ?? null;
        $this->nombre= $args['nombre'] ?? "";
        $this->apellido= $args['apellido'] ?? "";
        $this->email= $args['email'] ?? "";
        $this->password= $args['password'] ?? "";
        $this->telefono= $args['telefono'] ?? "";
        $this->admin= $args['admin'] ?? "0";
        $this->confirmado= $args['id'] ?? "0";
        $this->token= $args['id'] ?? "";
    }
    public function validandoNuevaCuenta(){
        if(empty($this->nombre)){

            self::$alertas['error'][]="El nombre es obligatorio";
            
        }
        if(empty($this->apellido)){

            self::$alertas['error'][]="El apellido es obligatorio";
            
        }
        if(empty($this->email)){

            self::$alertas['error'][]="El email es obligatorio";
            
        }
        if(empty($this->password)){

            self::$alertas['error'][]="La contraseña es obligatoria";
            
        }
        
        if(empty($this->telefono)){

            self::$alertas['error'][]="El teléfono es obligatorio";
            
        }
        if(strlen($this->telefono)<10){

            self::$alertas['error'][]="Ingrese un teléfono válido";
            
        }
        if (strlen($this->password)<6) {
            self::$alertas['error'][]="La contraseña debe contener al menos 6 caracteres";
        }
        
        
        return self::$alertas;
    }
    //Revisa si el usuario existe
    public function existeUser(){
        $query= "SELECT * FROM ".self::$tabla." WHERE email = '".$this->email."' LIMIT 1 ";
        $resultado= self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][]="El usuario ya existe";

        }
        return $resultado;
      
    }
    public function hashPassword(){
        $this->password= password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function CrandoToken(){
        $this->token = uniqid();
    
    }
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][]="El email es obligatorio";
        }
        if(!$this->password){
            self::$alertas['error'][]="El password es obligatorio";
        }
        return self::$alertas;
    }
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][]="El email es obligatorio";
        }
     
        return self::$alertas;
    }
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][]="Necesitas un password";
        }else{
            if(strlen($this->password)<6){
            self::$alertas['error'][]="Tu password debe contener al menos 6 caracteres";
             }
        }
        
        return self::$alertas;
    }
    public function comprobandopasswordyverify($password){
        $resultado= password_verify($password, $this->password);
       if (!$resultado || !$this->confirmado) {
        self::$alertas['error'][]='Confirma tu cuenta o verfica tus datos';
       }else{
        return true;
       }
    }
}
?>