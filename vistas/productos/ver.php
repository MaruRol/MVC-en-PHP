<?php
/** @var array $producto */
?>
<?php require __DIR__ . "/../header.php"; ?>
<?php require __DIR__ . "/../navbar.php"; ?>

<div class="container mt-5" style="max-width: 720px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Detalle del Producto #<?= (int)$producto['id'] ?></h3>
        <a href="index.php?c=producto&a=inicioListado" class="btn btn-secondary">Volver</a>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> <?= (int)$producto['id'] ?></li>
        <li class="list-group-item"><strong>Nombre:</strong> <?= htmlspecialchars($producto['nombre']) ?></li>
        <li class="list-group-item"><strong>Precio:</strong> <?= htmlspecialchars((string)$producto['precio']) ?></li>
        <li class="list-group-item"><strong>Stock:</strong> <?= htmlspecialchars((string)$producto['stock']) ?></li>
        <li class="list-group-item"><strong>Observaciones:</strong> <?= htmlspecialchars((string)$producto['observacion']) ?></li>
    </ul>

    <div class="mt-3">
        <a href="index.php?c=producto&a=editar&id=<?= (int)$producto['id'] ?>" class="btn btn-warning">Editar</a>
        <a href="index.php?c=producto&a=eliminar&id=<?= (int)$producto['id'] ?>"
           class="btn btn-danger"
           onclick="return confirm('¿Eliminar este producto?');">Eliminar</a>
    </div>
</div>