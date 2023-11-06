<?php

require_once 'clases/clsDepartamento.php';


$departamento = new Departamento();

if (isset($_POST['ingresar_departamento'])) {
    $add_nombre = mysqli_real_escape_string($con, $_POST['add_nombre'] ?? '');


    if (strlen($mensaje) > 0) {
        AlertaAdvertencia($mensaje);
    } else {
        $departamento->nombre = $add_nombre;

        $res = $departamento->Registro($con);
        if ($res) {
            $_SESSION['mensaje'] = "<b>departamento registrado exitosamente</b>";
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=departamento" />  ';
        } else {
            AlertaError('<b>Error al registrar departamento</b>');
        }
    }
} else if (isset($_POST['modificar_departamento'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre'] ?? '');
    $id = $_POST['id'];

    if (strlen($mensaje) > 0) {
        AlertaAdvertencia($mensaje);
    } else {
        $departamento->nombre = $nombre;
        $departamento->id = $id;
        $res = $departamento->Modificar($con);
        if ($res) {
            $_SESSION['mensaje'] = "<b>departamento modificado exitosamente</b>";
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=departamento" />  ';
        } else {
            AlertaError('<b>Error al modificar departamento</b>');
        }
    }
} else if (isset($_POST['eliminar_departamento'])) {
    $id = $_POST['delete_id'];
    $departamento->id = $id;
    $res = $departamento->Eliminar($con);
    if ($res) {
        $_SESSION['mensaje'] = "<b>departamento eliminado exitosamente</b>";
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=departamento" />  ';
    } else {
        AlertaError('<b>Error al eliminar departamento</b>');
    }
}

$res = $departamento->Consultar($con);

require 'views/departamento.view.php';
