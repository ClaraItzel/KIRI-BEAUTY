<?php 
namespace Controllers;

use Model\Cita;
use Model\CitasServicios;
use Model\Servicio;

class APIController{
    public static function index(){

        $servcio= Servicio::all();
        echo json_encode($servcio);
    }
    public static function guardar(){
        //Alamacena la citta y devuelve el id
         $cita= new Cita($_POST);
        $resultado= $cita->guardar(); 
        $id=$resultado['id'];
        
        //Almacena las citas y el servicio
        $idServcios= explode(",",$_POST['servicios']);
        foreach($idServcios as $servicio){
            $args=[
                'citaId'=>$id,
                'servicioId'=>$servicio
            ];
            $citaServicio= new CitasServicios($args);
            
           $citaServicio->guardar();
        }
        $respuesta=[
            'resultado'=> $resultado
        ];
        echo json_encode($respuesta);
    }
    public static function delete(){
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $id= $_POST['idCita'];
           $cita= Cita::find($id);
           $cita->eliminar();
           header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
}
?>