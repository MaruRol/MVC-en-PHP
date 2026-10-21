<?php
/*Formulario para ingresar productos nuevos*/ 
/** @var array $producto */
$producto = $producto ?? ['nombre' => '', 'precio' => '', 'stock' => '', 'observacion' => ''];
$errores  = $errores ?? [];
?>
<?php require __DIR__ . "/../header.php"; ?>
<?php require __DIR__ . "/../navbar.php"; ?>

<div class="container mt-5" style="max-width: 720px;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Nuevo Producto</h3>
        <a href="index.php?c=producto&a=inicioListado" class="btn btn-secondary">Volver</a>
    </div>

    <?php if (!empty($errores)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errores as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="index.php?c=producto&a=guardar" method="POST" class="card p-4 shadow-sm">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required
                   value="<?= htmlspecialchars($producto['nombre']) ?>">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" min="0" name="precio" id="precio"
                       class="form-control" required
                       value="<?= htmlspecialchars((string)$producto['precio']) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" min="0" name="stock" id="stock"
                       class="form-control" required
                       value="<?= htmlspecialchars((string)$producto['stock']) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observaciones</label>
            <textarea name="observacion" id="observacion" rows="3" class="form-control"><?= htmlspecialchars($producto['observacion']) ?></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?c=producto&a=inicioListado" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>