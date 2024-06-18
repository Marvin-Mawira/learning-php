<?php

// Get the path from the URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Define the routes and their corresponding controllers
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

// Function to route to the correct controller
function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

// Function to handle abort with a specific HTTP response code
function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

// Call the routing function with the current URI
routeToController($uri, $routes);


// if ($uri === '/') {
//     require 'controllers/index.php';
// } 
// else if ($uri === '/about') {
//     require 'controllers/about.php';
// } 
// else if ($uri === '/contact') {
//     require 'controllers/contact.php';
// }
?>

