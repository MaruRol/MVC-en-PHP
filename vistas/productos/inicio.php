<?php

/** @var array $productos */ ?>

<?php require __DIR__ . "/../header.php"; ?>
<?php require __DIR__ . "/../navbar.php"; ?>


<div class="container text-center">

    <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
        <h3 class="mb-0">Listado de Productos</h3>
        <a href="index.php?c=producto&a=nuevo" class="btn btn-primary">+ Nuevo producto</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $col): ?>
                        <tr>
                            <td><?= (int)$col['id'] ?></td>
                            <td><?= htmlspecialchars($col['nombre'])                              //"htmlspeacialchars sirve para quitar las etiquetas de js y mostrarlo como codigo html"
                                ?></td>
                            <td><?= htmlspecialchars($col['precio']) ?></td>
                            <td><?= htmlspecialchars($col['stock']) ?></td>
                            <td><?= htmlspecialchars($col['observacion']) ?></td>
                            <td class="text-center text-nowrap">
                                <a href="index.php?c=producto&a=ver&id=<?= (int)$col['id'] ?>"
                                    class="btn btn-sm btn-info" title="Ver">Ver</a>

                                <a href="index.php?c=producto&a=editar&id=<?= (int)$col['id'] ?>"
                                    class="btn btn-sm btn-warning" title="Editar">Editar</a>

                                <a href="index.php?c=producto&a=eliminar&id=<?= (int)$col['id'] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que quieres eliminar este producto?');"
                                    title="Eliminar">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>