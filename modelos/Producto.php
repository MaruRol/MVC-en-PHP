<?php

class Producto{

   private mysqli $conexion;

   public function __construct(mysqli $conexbd)
   {
       $this->conexion=$conexbd;

   }

   public function listartodo(){
    $sql="select * from productos";
    $result=$this->conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

public function insertar(array $datos): bool {
    $sql = "INSERT INTO productos (nombre, precio, stock, observacion)
            VALUES (?, ?, ?, ?)";
    $stmt = $this->conexion->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param(
        "sdis",
        $datos['nombre'],
        $datos['precio'],
        $datos['stock'],
        $datos['observacion']
    );
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

public function obtenerPorId(int $id): ?array {
    $stmt = $this->conexion->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $fila = $res->fetch_assoc();
    $stmt->close();
    return $fila ?: null;
}

public function actualizar(int $id, array $datos): bool {
    $sql = "UPDATE productos
            SET nombre = ?, precio = ?, stock = ?, observacion = ?
            WHERE id = ?";
    $stmt = $this->conexion->prepare($sql);
    if (!$stmt) return false;

    $stmt->bind_param(
        "sdisi",
        $datos['nombre'],
        $datos['precio'],
        $datos['stock'],
        $datos['observacion'],
        $id
    );
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

public function eliminar(int $id): bool {
    $stmt = $this->conexion->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}



}


?>