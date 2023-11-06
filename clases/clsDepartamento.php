<?php
class departamento
{
    public int $id;
    public string $nombre;

    public function Registro($con)
    {
        $query = "INSERT INTO departamento (Nombre) 
        VALUES('$this->nombre');";

        return mysqli_query($con, $query);
    }

    public function Consultar($con)
    {
        $query = "SELECT * FROM departamento;";
        return mysqli_query($con, $query);
    }

    public function Buscar($con)
    {
        $query = "SELECT * FROM departamento WHERE ID_Departamento = $this->id;";
        $res = mysqli_query($con, $query);
        return mysqli_fetch_assoc($res);
    }


    public function Modificar($con)
    {
        $query = "UPDATE departamento
    SET Nombre = '$this->nombre' WHERE ID_Departamento = $this->id;";
        return mysqli_query($con, $query);
    }



    public function Eliminar($con)
    {
        $query = "DELETE FROM departamento WHERE ID_Departamento = $this->id;";
        return mysqli_query($con, $query);
    }
}
