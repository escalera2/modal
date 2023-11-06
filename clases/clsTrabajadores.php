<?php
class Trabajador
{
    public int $id;
    public string $nombre;
    public string $cedula;
    public string $email;
    public string $direccion;
    public float $salario;

    public function Registro($con)
    {
        $query = "INSERT INTO trabajadores(nombre, cedula, email, direccion, salario)
        VALUES('$this->nombre', '$this->cedula', '$this->email', '$this->direccion', '$this->salario');";

        return mysqli_query($con, $query);
    }

    public function Consultar($con)
    {
        $query = "SELECT * FROM trabajadores;";
        return mysqli_query($con, $query);
    }

    public function Buscar($con)
    {
        $query = "SELECT * FROM trabajadores WHERE id = $this->id;";
        $res = mysqli_query($con, $query);
        return mysqli_fetch_assoc($res);
    }

    public function Modificar($con)
    {
        $query = "UPDATE trabajadores
        SET nombre = '$this->nombre', cedula = '$this->cedula', email = '$this->email',
        direccion = '$this->direccion', salario = '$this->salario' WHERE id = '$this->id';";
        return mysqli_query($con, $query);
    }

    public function Eliminar($con)
    {
        $query = "DELETE FROM trabajadores WHERE id = '$this->id';";
        return mysqli_query($con, $query);
    }
}
