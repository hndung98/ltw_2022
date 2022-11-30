<?php
// Branch of Thong
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
    echo 'uri: '.$uri.'<br>';
    $uris = explode("?", $uri);
    if(count($uris) > 1){
        $uri = $uris[0];
        $params = $uris[1];
        $firstParam = explode("=", $params);
        echo 'firstParam0: '.$firstParam[0].'<br>';
        echo 'firstParam1: '.$firstParam[1].'<br>';
        if($firstParam[0] == 'pid' && is_numeric($firstParam[1])){
            $_SESSION["pid"] = $firstParam[1];
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