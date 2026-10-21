<?php

  require_once __DIR__."/../modelos/Producto.php";

  class ProductoController{


      private producto $productoModelo;

      public function __construct(mysqli $conexbd){

        $this->productoModelo=new Producto($conexbd);

      }

      public function inicioListado(){
          $productos = $this->productoModelo->listartodo();
        require __DIR__."/../vistas/productos/inicio.php";
      }
      public function nuevo() {
    require __DIR__ . "/../vistas/productos/formulario.php";
}

public function guardar() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php?c=producto&a=inicioListado");
        exit;
    }

    $datos = [
        'nombre'      => trim($_POST['nombre'] ?? ''),
        'precio'      => (float) ($_POST['precio'] ?? 0),
        'stock'       => (int)   ($_POST['stock'] ?? 0),
        'observacion' => trim($_POST['observacion'] ?? ''),
    ];

    $errores = [];
    if ($datos['nombre'] === '') $errores[] = "El nombre es obligatorio.";
    if ($datos['precio'] < 0)    $errores[] = "El precio no puede ser negativo.";
    if ($datos['stock'] < 0)     $errores[] = "El stock no puede ser negativo.";

    if ($errores) {
        $producto = $datos;
        require __DIR__ . "/../vistas/productos/formulario.php";
        return;
    }

    if ($this->productoModelo->insertar($datos)) {
        header("Location: index.php?c=producto&a=inicioListado&msg=creado");
    } else {
        $error = "No se pudo guardar el producto.";
        $producto = $datos;
        require __DIR__ . "/../vistas/productos/formulario.php";
    }
    exit;
}
      
public function ver() {
    $id = (int) ($_GET['id'] ?? 0);
    $producto = $this->productoModelo->obtenerPorId($id);

    if (!$producto) {
        http_response_code(404);
        echo "Producto no encontrado.";
        return;
    }
    require __DIR__ . "/../vistas/productos/ver.php";
}



public function editar() {
    $id = (int) ($_GET['id'] ?? 0);
    $producto = $this->productoModelo->obtenerPorId($id);

    if (!$producto) {
        http_response_code(404);
        echo "Producto no encontrado.";
        return;
    }
    require __DIR__ . "/../vistas/productos/editar.php"; // reutilizamos el formulario
}

public function actualizar() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php?c=producto&a=inicioListado");
        exit;
    }

    $id = (int) ($_POST['id'] ?? 0);

    $datos = [
        'nombre'      => trim($_POST['nombre'] ?? ''),
        'precio'      => (float) ($_POST['precio'] ?? 0),
        'stock'       => (int)   ($_POST['stock'] ?? 0),
        'observacion' => trim($_POST['observacion'] ?? ''),
    ];

    $errores = [];
    if ($datos['nombre'] === '') $errores[] = "El nombre es obligatorio.";
    if ($datos['precio'] < 0)    $errores[] = "El precio no puede ser negativo.";
    if ($datos['stock'] < 0)     $errores[] = "El stock no puede ser negativo.";

    if ($errores) {
        $producto = $datos + ['id' => $id];
        require __DIR__ . "/../vistas/productos/formulario.php";
        return;
    }

    if ($this->productoModelo->actualizar($id, $datos)) {
        header("Location: index.php?c=producto&a=inicioListado&msg=actualizado");
    } else {
        $error = "No se pudo actualizar el producto.";
        $producto = $datos + ['id' => $id];
        require __DIR__ . "/../vistas/productos/formulario.php";
    }
    exit;
}


public function eliminar() {
    $id = (int) ($_GET['id'] ?? 0);

    if ($id > 0 && $this->productoModelo->eliminar($id)) {
        header("Location: index.php?c=producto&a=inicioListado&msg=eliminado");
    } else {
        header("Location: index.php?c=producto&a=inicioListado&msg=error");
    }
    exit;
}

} // fin 

?>