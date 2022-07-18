<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\AdminController;
use Controllers\LoginControllers;
use Controllers\ServicioController;

$router = new Router();

//Iniciando sesión
$router->get('/',[LoginControllers::class,'login']);
$router->post('/',[LoginControllers::class,'login']);
$router->get('/logout',[LoginControllers::class,'logout']);

//Recuperando password
$router->get('/forgot',[LoginControllers::class,'forgot']);
$router->post('/forgot',[LoginControllers::class,'forgot']);
$router->get('/restore',[LoginControllers::class,'restore']);
$router->post('/restore',[LoginControllers::class,'restore']);

//Creando cuenta
$router->get('/crearCuenta',[LoginControllers::class,'crear']);
$router->post('/crearCuenta',[LoginControllers::class,'crear']);
//Comprueba tu cuenta
$router->get('/confirmar-cuenta',[LoginControllers::class,'confirmar']);
$router->get('/mensaje',[LoginControllers::class,'mensaje']);
//AREA PRIVADA
$router->get('/cita',[CitaController::class,'index']);
$router->get('/admin',[AdminController::class,'index']);
//API de Citas
$router->get('/api/servicios',[APIController::class,'index']); 
$router->post('/api/citas',[APIController::class,'guardar']); 
$router->post('/api/eliminar',[APIController::class,'delete']); 

//Crud de servicios
$router->get('/servicios',[ServicioController::class,'index']);
$router->get('/servicios/crear',[ServicioController::class,'crear']);
$router->post('/servicios/crear',[ServicioController::class,'crear']);
$router->get('/servicios/actualizar',[ServicioController::class,'updt']);
$router->post('/servicios/actualizar',[ServicioController::class,'updt']);
$router->post('/servicios/eliminar',[ServicioController::class,'delete']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();