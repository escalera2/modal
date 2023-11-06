<?php
require_once 'clases/clsValidaciones.php';
require_once 'clases/clsClientes.php';


$cliente = new Cliente();  // Assuming that there's a class named Cliente



if (isset($_POST['ingresar_cliente'])) {
    $add_nombre = mysqli_real_escape_string($con, $_POST['add_nombre'] ?? '');
    $add_ApellidoP = mysqli_real_escape_string($con, $_POST['add_ApellidoP'] ?? '');
    $add_ApellidoM = mysqli_real_escape_string($con, $_POST['add_ApellidoM'] ?? '');
    $add_Ci = mysqli_real_escape_string($con, $_POST['add_Ci'] ?? '');
    $add_Telefono = mysqli_real_escape_string($con, $_POST['add_Telefono'] ?? '');
    $add_correoe = mysqli_real_escape_string($con, $_POST['add_correoe'] ?? '');

    $mensaje = Validaciones::ValidarCedula($add_Ci);  // Fixing the variable name

    if (strlen($mensaje) > 0) {
        AlertaAdvertencia($mensaje);
    } else {
        $cliente->nombre = $add_nombre;
        $cliente->ApellidoP = $add_ApellidoP;
        $cliente->ApellidoM = $add_ApellidoM;
        $cliente->Ci = $add_Ci;
        $cliente->Telefono = $add_Telefono;
        $cliente->correoe = $add_correoe;

        $res = $cliente->Registro($con);

        if ($res) {
            $_SESSION['mensaje'] = "<b>Cliente registrado exitosamente</b>";
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes" />';
        } else {
            AlertaError('<b>Error al registrar cliente</b>');
        }
    }
} else if (isset($_POST['modificar_cliente'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre'] ?? '');
    $ApellidoP = mysqli_real_escape_string($con, $_POST['ApellidoP'] ?? '');
    $ApellidoM = mysqli_real_escape_string($con, $_POST['ApellidoM'] ?? '');
    $Ci = mysqli_real_escape_string($con, $_POST['Ci'] ?? '');
    $Telefono = mysqli_real_escape_string($con, $_POST['Telefono'] ?? '');
    $correoe = mysqli_real_escape_string($con, $_POST['correoe'] ?? '');
    $id = $_POST['id'];

    $mensaje = Validaciones::ValidarCedula($Ci);

    if (strlen($mensaje) > 0) {
        AlertaAdvertencia($mensaje);
    } else {

        $cliente->nombre = $nombre;
        $cliente->ApellidoP = $ApellidoP;
        $cliente->ApellidoM = $ApellidoM;
        $cliente->Ci = $Ci;
        $cliente->correoe = $correoe;
        $cliente->Telefono = $Telefono;
        $cliente->id = $id;

        $res = $cliente->Modificar($con);

        if ($res) {
            $_SESSION['mensaje'] = "<b>Cliente modificado exitosamente</b>";
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes" />';
        } else {
            AlertaError('<b>Error al modificar cliente</b>');
        }
    }
} else if (isset($_POST['eliminar_cliente'])) {
    $id = $_POST['delete_id'];
    $cliente->id = $id;
    $res = $cliente->Eliminar($con);

    if ($res) {
        $_SESSION['mensaje'] = "<b>Cliente eliminado exitosamente</b>";
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes" />';
    } else {
        AlertaError('<b>Error al eliminar cliente</b>');
    }
}

$res = $cliente->Consultar($con);
require 'views/clientes.view.php';
