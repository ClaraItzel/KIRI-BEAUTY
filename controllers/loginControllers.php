<?php 
namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginControllers{
    public static function login(Router $router){
        $alertas=[];
        if ($_SERVER['REQUEST_METHOD']==='POST') {
           $auth= new Usuario($_POST);
           $alertas= $auth->validarLogin();
            if(empty($alertas)){
               //Comprobar que exista usuario
               $usuario = Usuario::where('email',$auth->email);
              if ($usuario) {
                    if ($usuario->comprobandopasswordyverify($auth->password)){
                        //Autenticando user
                       // session_start();
                        $_SESSION['id']=$usuario->id;
                        $_SESSION['email']=$usuario->email;
                        $_SESSION['login']=true;
                        $_SESSION['nombre']=$usuario->nombre." ".$usuario->apellido;
                        
                        if ($usuario->admin==1) {
                           $_SESSION['admin']= $usuario->admin ?? null;
                           header('Location: /admin');
                        }else{
                            header('Location: /cita');
                        }
                    }
              }else{
                Usuario::setAlerta('error','El usuario o la contaseña son incorrectos');
               
              }
            }


        }
        $alertas= Usuario::getAlertas();
        $router->render('auth/login',[
            'alertas'=>$alertas
        ]);
    }
    public static function logout(){
        $_SESSION=[];
        header('Location: /');
    }
    public static function forgot(Router $router){
       $alertas=[];
       if ($_SERVER['REQUEST_METHOD']==='POST') {
        $auth= new Usuario($_POST);
        $auth->validarEmail();
        $alertas= Usuario::getAlertas();
        if (empty($alertas)) {
            $usuario=Usuario::where('email',$auth->email);
            if ($usuario && $usuario->confirmado==="1") {
                //Generando token
                $usuario->CrandoToken();
                $usuario->guardar();

                //Eniando email
                $email= new Email($usuario->nombre,$usuario->email,$usuario->token);
                $email->enviarInstrucciones();
                Usuario::setAlerta('exito','Te enviamos un email con instrucciones para recuperar tu password');
            }else{
                Usuario::setAlerta('error','El usuario no existe o no está confirmado');
            }
        }
       }
       $alertas= Usuario::getAlertas();
        $router->render('auth/forgot',[
            'alertas'=>$alertas
       ]);
    }
    public static function restore(Router $router){
        $alertas=[];
        $token= s($_GET['token']);
        $error= false;
        //Buscando user por el token
        $usuario= Usuario::where('token',$token);

        if (empty($usuario)) {
            Usuario::setAlerta('error','Token no válido');
            $error=true;
        }
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            //Leer el nuevo password y guardar

            $password= new Usuario($_POST);
           $alertas= $password->validarPassword();
           if (empty($alertas)) {
           $usuario->password=null;
           $usuario->password=$password->password;
            $usuario->hashPassword();
            $usuario->token=null;
           $resultado= $usuario->guardar();
           if ($resultado) {
           header('Location: /');
           }
           }
        }

        $alertas=Usuario::getAlertas();
        $router->render('auth/restore-pws',[
            'alertas'=>$alertas,
            'error'=>$error
        ]);
    }
    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router){
        $alertas=[];
        $token= s($_GET['token']);
        $usuario= Usuario::where('token',$token);
        if (!$usuario) {
            //Mostrar mensaje de error
            Usuario::setAlerta('error','token no válido');
        }else{
            //Mostrar mensaje de exito
            $usuario->confirmado="1";
            $usuario->token= null;
            $usuario->guardar();
            Usuario::setAlerta('exito','Cuenta confirmada exitosamente');
        }
        $alertas= Usuario::getAlertas();
        $router->render('auth/confirmar-cuenta',[
            'alertas'=>$alertas
           
        ]);
    }
    public static function crear(Router $router){
        $usuario = new Usuario($_POST); 

        //Alertas vacías
        $alertas=[];
         if ($_SERVER['REQUEST_METHOD']==='POST') {
          $usuario->sincronizar($_POST);
          $alertas = $usuario->validandoNuevaCuenta();
            //Reviar que alertas este vacío

            if (empty($alertas)) {
            
              $resultado=  $usuario->existeUser();
                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                }else{
                  //password hasha
                  $usuario->hashPassword();

                  //Generando token
                $usuario->CrandoToken();
              
                //Eviando el email
                    $email= new Email($usuario->email,$usuario->nombre,$usuario->token);
                    $email->enviarConfirmacion();

                    //Crando el usuario
                  
                   $resultado= $usuario->guardar();
                   if ($resultado) {
                    header("Location: /mensaje");
                   }
                }
            }
        } 
        $router->render('auth/crearCuenta',[
            'usuario'=> $usuario,
            'alertas'=>$alertas
        ]);
    }
}
?>