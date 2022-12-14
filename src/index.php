<?php
// Start the session
session_start();

$routes = [];
static $base_uri = '/assignment/';

route($base_uri . 'home/', function(){
    include './Pages/HomePage.php';
});
route($base_uri . 'cart/', function(){
    include './Pages/CartPage.php';
});
route($base_uri . 'product/', function(){
    include './Pages/ProductPage.php';
});
route($base_uri . 'profile/', function(){
    include './Pages/ProfilePage.php';
});
route($base_uri . 'about/', function(){
    include './Pages/AboutPage.php';
});
route($base_uri . '404/', function(){
    include './Pages/404Page.php';
});
route($base_uri . 'dashboard/', function () {
    include './Pages/Dashboard.php';
});

function route(string $path, callable $callback){
    global $routes;
    // $lastChar = substr($path, -1);
    // if($lastChar != '/'){
    //     $path =$path.'/';
    // }
    $routes[$path] = $callback;
}

run();

function run(){
    global $routes;
    global $base_uri;
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    //echo 'uri: '.$uri.'<br>';
    $uris = explode("?", $uri);
    if(count($uris) > 1){
        $uri = $uris[0];
        //echo 'new uri: '.$uri.'<br>';
        $params = $uris[1];

        $firstParam = explode("=", $params);
        $firstKey = $firstParam[0];
        $firstValue = $firstParam[1];
        //echo 'firstKey: '.$firstKey.'<br>';
        //echo 'firstValue: '.$firstValue.'<br>';
        
        if($firstParam[0] == 'pid'){
            if(strpos($firstValue, '.') !== false){
                //echo "firstValue is float<br>";
                $_SESSION["pid"] = "-1";
            }
            else{
                //echo "firstValue is int: " . is_numeric($firstValue) . "<br>";
                $_SESSION["pid"] = $firstValue;
            }
        }
    }
    $lastChar = substr($uri, -1);
    if($lastChar != '/'){
        $uri = $uri.'/';
        header('Location: '.$uri);
        die();
    }
    $found = false;
    // echo 'uri: '.$uri.'<br>';
    foreach($routes as $path => $callback){
        // echo 'path: '.$path.'<br>';
        if ($path !== $uri) continue;

        $found = true;
        $callback();
    }
    if(!$found){
        $notFoundCallback = $routes[$base_uri . '404/'];
        $notFoundCallback();
    }
}

// $request = $_SERVER['REQUEST_URI'];

// echo '<script type="text/javascript"> console.log("'.$request.'"); </script>';

// switch ($request) {

//     case '/Home':
//         require __DIR__ . './Pages/Home.php';
//         break;

//     default:
//         http_response_code(404);
//         require __DIR__ . './Pages/404.php';
//         break;
// }