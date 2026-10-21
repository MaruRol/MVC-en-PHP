<?php

require_once __DIR__ . "/../config/Conexion.php";
require_once __DIR__ . "/../controladores/ProductoController.php";
require_once __DIR__ . "/../controladores/HomeController.php";


$objconexion = new Conexion();

$conexbd = $objconexion->conectar();

$c = isset($_GET['c']) ? $_GET['c'] : 'home';
$a = isset($_GET['a']) ? $_GET['a'] : 'homeInicio';

$rutas = [

    "home" => [
        "controller" => "HomeController",
        "acciones" => ["homeInicio"]
    ],

    "producto" => [
        "controller" => "ProductoController",
        "acciones" => ["inicioListado", "nuevo", "guardar", "ver", "editar", "actualizar", "eliminar"]
    ]
];

// Validación de existencia de controladores y acciones

/*if (!isset($rutas[$c]) || !in_array($a, $rutas[$c]["acciones"])) {
    http_response_code(404);
    echo "Controlador no encontrado / Acción no permitida!";
    exit;
}*/

$controlador = new $rutas[$c]["controller"]($conexbd);


$controlador->$a();
