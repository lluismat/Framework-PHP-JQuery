<?php
  $host = "127.0.0.1";
  $user = "root";
  $pass = "";
  $db = "comentarios";
  $port = 3306;
  $tabla="mensajes";


$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
$sql = "create database shop";
$res = mysqli_query($conexion, $sql);
print_r($res);

$sql = "use shop";
$res = mysqli_query($conexion, $sql);
print_r($res);

$sql = "INSERT INTO mensajes(nombre, email, asunto, mensaje,"
          . " hora, fecha) VALUES ('$nombre', '$email', '$asunto',"
          . " '$mensaje', now(), now())";
$res = mysqli_query($conexion, $sql);
print_r($res);

$sql = "select * from mensajes";
$result = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($result)) {
      $cad .= "Nombre: " . $row['nombre'] . " Email: " . $row['email']. "<br>";
      $cad .= "Asunto: " . $row['asunto'] . " Msje: " . $row['mensaje']. "<br>";
  }
mysqli_close($conexion);
print_r($cad);
