<?php
  $host = "127.0.0.1";
  $user = "root";
  $pass = "root";
  $db = "tiendaLluis";
  $port = 3306;
  $tabla="products";

  $conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

  $sql = "INSERT INTO products (cod_prod,name_prod,description,color,category,city,community,country,price,entry_date,expiration_date,avatar) VALUES ('1544','product1','ola k ase','rojo','cat1','boc','cv','spain','123','15/09/2016','20/11/2017','avatardfasdf512')";
  $res = mysqli_query($conexion, $sql);
  print_r($res);
