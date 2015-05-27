<?php

/**
 * This is you FrontController, the only point of access to your webapp
 */
 
 require __DIR__ . '/../vendor/autoload.php';
 

/**
 * Use Yaml components for load a config routing, $routes is in yaml app/config/routing.yml :
 *
 * Url will be /index.php?p=route_name
 *
 *
 */

//Thaks to p=, find the current route

//ControllerClassName, end name is ...Controller

//ActionName, end name is ...Action
/*$action_name = ...;

$controller = new $controller_class();

//$Request can by an object
$request['request'] = &$_POST;
$request['query'] = &$_GET;
//...

//$response can be an object
$response = $controller->$action_name($request);


/**
 * Use Twig !
 */
//require $response['view'];
/**
* This is you FrontController, the only point of access to your webapp
*/
use Symfony\Component\Yaml\Yaml;
require __DIR__ . '/../vendor/autoload.php';
/**
* Use Yaml components for load a config routing, $routes is in yaml app/config/routing.yml :
*
* Url will be /index.php?p=route_name
*
*
*/
$routes = Yaml::parse(file_get_contents(__DIR__.'/../app/config/routing.yml'));
/*if(!empty(GET['p'])){
	$page = ['home'];
}else()*/
$currentroute = $routes[$_GET['p']]['controller'];
$routes_array = explode(':',$currentroute);
//ControllerClassName, end name is ...Controller
$controller_class = $routes_array[0];
//ActionName, end name is ...Action
$action_name = $routes_array[1];
$controller = new $controller_class();
//$Request can by an object
$request['request'] = &$_POST;
$request['query'] = &$_GET;
//...
//$response can be an object
$response = $controller->$action_name($request);
/**
* Use Twig !
*/
require_DIR_ .'/../src/'.$response['view'];

   if (isset($_SESSION['flashBag'])) {
        foreach ($_SESSION['flashBag'] as $type => $flash) {
            foreach ($flash as $key => $message) {
                echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
                // un fois affiché le message doit être supprimé
                unset($_SESSION['flashBag'][$type][$key]);
            }
        }
    }
