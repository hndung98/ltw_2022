<?php

echo '<script type="text/javascript"> console.log("'.'index init '.'"); </script>';

$routes = [];

route('/assignment/', function() {
    echo "Home Page<br>";
});
route('/assignment/home/', function() {
    echo "/home Page<br>";
});
route('/assignment/404/', function() {
    echo "Page not found<br>";
});

function route(string $path, callable $callback){
    global $routes;
    $routes[$path] = $callback;
}

run();

function run(){
    global $routes;
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    echo '<script type="text/javascript"> console.log("'.$uri.'"); </script>';
    $found = false;
    echo 'uri: '.$uri.'<br>';
    foreach($routes as $path => $callback){
        echo 'path: '.$path.'<br>';
        if ($path !== $uri) continue;

        $found = true;
        $callback();
    }
    if(!$found){
        $notFoundCallback = $routes['/assignment/404/'];
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