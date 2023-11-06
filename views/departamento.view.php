<div class="content-wrapper">
    <!-- Encabezado del Contenido (Encabezado de página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Autos</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- Botón para agregar nuevo cliente con modal asociado -->
                    <button title="Agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                        <i class="fas fa-plus"></i> Agregar Nuevo Departamento
                    </button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Encabezado de la tarjeta -->
                    <div class="card-body table-responsive">
                        <!-- Tabla para mostrar la información de los clientes -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['Nombre'] ?></td>
                                        <td>
                                            <!-- Acciones para modificar o eliminar un cliente -->
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <a title="Modificar departamento" data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('id').value = <?= $row['ID_Departamento'] ?>;document.getElementById('Nombre').value = '<?= $row['Nombre'] ?>';" class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Modificar
                                                    </a>
                                                </div>

                                                <div class="col-sm-6">
                                                    <a title="Eliminar departamento" data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['ID_Departamento'] ?>;document.getElementById('delete_nombre').innerHTML = '<?= $row['Nombre'] ?>';" class="btn btn-danger btn-sm borrar">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cuerpo de la tarjeta -->
                </div>
                <!-- Tarjeta -->
            </div>
            <!-- Columna -->
        </div>
        <!-- Fila -->
    </section>
    <!-- Contenido -->
</div>

<!-- Modales permanecen sin cambios -->


<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Departamento</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=departamento" id="ingresar" method="POST">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" class="form-control" placeholder="Nombre del departamento" onkeypress="return validarTexto(event)" required>
                    </div>

                    <input type="submit" name="ingresar_departamento" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title" id="defaultModalLabel">Editar Departamento</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=departamento" method="POST">
                    <!-- Use ID_Cliente for the hidden field -->
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="Nombre" class="form-control" required>
                    </div>

                    <input type="submit" name="modificar_departamento" id="modificar_departamento" value="Actualizar" class="btn btn-success">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Departamnto</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=departamento" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">

                    <strong>
                        <p id="delete_nombre"></p>
                    </strong></label>


                    <div class="form-group">
                        <label class="mr-sm-2">¿Deseas Eliminar este departamento?</label>
                    </div>

                    <input type="submit" name="eliminar_departamento" id="eliminar_departamento" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>