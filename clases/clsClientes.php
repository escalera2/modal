<?php
class cliente
{
    public int $id;

    public string $nombre;
    public string $ApellidoP;
    public string $ApellidoM;
    public string $Ci;
    public string $Telefono;
    public string $correoe;
    public function Registro($con)
    {
        $query = "INSERT INTO cliente (Nombre, Apellido_Paterno, Apellido_Materno, Ci, Telefono, correo_electronico) 
        VALUES('$this->nombre','$this->ApellidoP', '$this->ApellidoM', '$this->Ci', '$this->Telefono', '$this->correoe');";

        return mysqli_query($con, $query);
    }

    public function Consultar($con)
    {
        $query = "SELECT * FROM cliente;";
        return mysqli_query($con, $query);
    }

    public function Buscar($con)
    {
        $query = "SELECT * FROM cliente WHERE ID = $this->id;";
        $res = mysqli_query($con, $query);
        return mysqli_fetch_assoc($res);
    }


    public function Modificar($con)
    {
        $query = "UPDATE cliente
                SET Nombre = '$this->nombre', Apellido_Paterno = '$this->ApellidoP', Apellido_Materno = '$this->ApellidoM',
                Ci = '$this->Ci', Telefono = '$this->Telefono', correo_electronico = '$this->correoe'
                WHERE ID = $this->id;";
        return mysqli_query($con, $query);
    }



    public function Eliminar($con)
    {
        $query = "DELETE FROM cliente WHERE ID = $this->id;";
        return mysqli_query($con, $query);
    }
}
