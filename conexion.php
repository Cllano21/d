<?php

$servername="LAPTOP-8FGD0OMN\SQLEXPRESS";
$conexion=array("Database"=>"tienda",
                 "UID"=>"sa",
                 "PWD"=>"1987",
                 "CharacterSet"=>"UTF-8");
$conn=sqlsrv_connect($servername,$conexion);
if ($conn)   {
    echo "conexion exitosa";
}else{
    echo "falo en la conexion";
}


?>