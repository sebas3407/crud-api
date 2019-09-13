<?php

/* Los headers permiten acceso desde otro dominio (CORS) a nuestro REST API o desde un cliente remoto via HTTP
 * Removiendo las lineas header() limitamos el acceso a nuestro RESTfull API a el mismo dominio
 **/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *"');
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 

include_once '../include/Config.php';
include_once '../../php/model.php';

/* Puedes utilizar este file para conectar con base de datos incluido en este demo; 
 * si lo usas debes eliminar el include_once del file Config ya que le mismo está incluido en DBHandler 
 **/
//require_once '../include/DbHandler.php'; 

require '../libs/Slim/Slim.php'; 
\Slim\Slim::registerAutoloader(); 
$app = new \Slim\Slim();

/* use GET  method to get a list of games */
$app->get('/games', function() {
    
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);

    $games = array();

    if ($connexio)
    {
      $instruccio = "SELECT * from game";

      $consulta   = consulta_multiple($connexio, $instruccio);
      $fila = obtenir_fila($consulta);  

      while ($fila)
            {
                $game = array();
                $game["id"] = $fila[0];
                $game["name"] = $fila[1];
                $games["platform"] = $fila[2];
                $game["description"] = $fila[3];
                $game["points"] = $fila[4];
                $game["price"] = $fila[5];
                $game["image"] = $fila[6];
                
                array_push($games, $game);
                $fila = obtenir_fila($consulta);
            }      
      tancar_consulta_multiple($consulta);
    }
  desconnectar_bd($connexio);

    $response = array();
    
    $response["error"] = false;
    $response["message"] = "Games loads: " . count($games);
    $response["games"] = $games;

    $json_string = json_encode($response, JSON_PRETTY_PRINT);

    echoResponse(200, $response);
});

$app->get('/games/platform', function() use ($app) {
    
    verifyRequiredParams(array('name'));

    $response = array();
    //capturamos los parametros recibidos y los almacenamos como un nuevo array
    $param['platformName']  = $app->request->post('name');
    $platformName = $param['platformName'];

    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);

    $games = array();

    if ($connexio)
    {
      $instruccio = "SELECT * from game where platformName='$platformName'";

      $consulta   = consulta_multiple($connexio, $instruccio);
      $fila = obtenir_fila($consulta);  

      while ($fila)
            {
                $game = array();
                $game["id"] = $fila[0];
                $game["name"] = $fila[1];
                $games["platform"] = $fila[2];
                $game["description"] = $fila[3];
                $game["points"] = $fila[4];
                $game["price"] = $fila[5];
                $game["image"] = $fila[6];
                
                array_push($games, $game);
                $fila = obtenir_fila($consulta);
            }      
      tancar_consulta_multiple($consulta);
    }
  desconnectar_bd($connexio);

    $response = array();
    
    $response["Query"] = $instruccio;
    $response["error"] = false;
    $response["message"] = "games load: " . count($games);
    $response["games"] = $games;

    $json_string = json_encode($response, JSON_PRETTY_PRINT);

    echoResponse(200, $response);
});

$app->get('/platforms', function() use ($app) {
    
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);

    $platforms = array();

    if ($connexio)
    {
      $instruccio = "SELECT * from platform";

      $consulta   = consulta_multiple($connexio, $instruccio);
      $fila = obtenir_fila($consulta);  

      while ($fila)
            {
                
                $platform = array();

                $platform["name"] = $fila[1];
                $platform["category"] = $fila[2];
                $platform["description"] = $fila[3];
                $platform["price"] = $fila[4];
                $platform["image"] = $fila[5];
                
                array_push($platforms, $platform);
                $fila = obtenir_fila($consulta);
            }      
      tancar_consulta_multiple($consulta);
    }
  desconnectar_bd($connexio);

    $response = array();
    
    $response["error"] = false;
    $response["message"] = "Users loads: " . count($users);
    $response["users"] = $users;

    $json_string = json_encode($response, JSON_PRETTY_PRINT);

    echoResponse(200, $response);
});

// Use POST method to create a product 

$app->post('/game' , function() use ($app) {
    // check for required params
    verifyRequiredParams(array('product_name'));

    $param['platformName']  = $app->request->post('product_name');
    $platformName = $param['platformName'];

    $response = array();
    $response["name"] = $param;
    //capturamos los parametros recibidos y los almacenamos como un nuevo array
    /*
    $param['product_name']  = $app->request->post('product_name');
    $param['category'] = $app->request->post('category');
    $param['description']  = $app->request->post('description');
    $param['price']  = $app->request->post('price');
    $param['image_path']  = $app->request->post('image_path');
    */
    // Podemos inicializar la conexion a la base de datos si queremos hacer uso de esta para procesar los parametros con DB 
    //$db = new DbHandler();

    // Podemos crear un metodo que almacene el nuevo auto, por ejemplo: 
    //$auto = $db->createAuto($param);
/*
    if ( is_array($param) ) {
        $response["error"] = false;
        $response["message"] = "Product create succesfully";
        $response["auto"] = $param;
    } else {
        $response["error"] = true;
        $response["message"] = "Error creating a new product, Please try it again.";
    }
    */
    echoResponse(201, $response);
});



/* App execution*/
$app->run();

/*********************** USEFULL FUNCTIONS **************************************/

/**
 * Verificando los parametros requeridos en el metodo o endpoint
 */
function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoResponse(400, $response);
        
        $app->stop();
    }
}
 
/**
 * Validando parametro email si necesario; un Extra ;)
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoResponse(400, $response);
        
        $app->stop();
    }
}
 
/**
 * Mostrando la respuesta en formato json al cliente o navegador
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoResponse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}

/**
 * Agregando un leyer intermedio e autenticación para uno o todos los metodos, usar segun necesidad
 * Revisa si la consulta contiene un Header "Authorization" para validar
 */
function authenticate(\Slim\Route $route) {
    // Getting request headers
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();
 
    // Verifying Authorization Header
    if (isset($headers['Authorization'])) {
        //$db = new DbHandler(); //utilizar para manejar autenticacion contra base de datos
 
        // get the api key
        $token = $headers['Authorization'];
        
        // validating api key
        if (!($token == API_KEY)) { //API_KEY declarada en Config.php
            
            // api key is not present in users table
            $response["error"] = true;
            $response["message"] = "Access denyed. Invalid Api Key";
            echoResponse(401, $response); 
            
            $app->stop(); //Stop the execution when validation fails
            
        } else {
            //procede utilizar el recurso o metodo del llamado
        }
    } else {
        // api key is missing in the header
        $response["error"] = true;
        $response["message"] = "Apy key is missing" ;
        echoResponse(400, $response);
        
        $app->stop();
    }
}
?>