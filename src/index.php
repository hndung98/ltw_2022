<?php

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
    $routes[$path] = $callback;
}

run();

function run(){
    global $routes;
    global $base_uri;
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
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