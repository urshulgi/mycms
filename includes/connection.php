<?php
# ~~~~ dbConnection: ~~~~
# No recibe parámetros.
# Sirve para crear la conexión a la base de datos.
# Retorna la conexión alojada en la variable $connection.
# Utilizada mayormente en functions.php y en includes.
function dbConnection () {
  # Datos del servidor
  $server = "localhost"; # Servidor
  $user = "phillips"; # Usuario
  $pass = "WeWill##Rise$"; # Contraseña
  $db = "mycms"; # Nombre de la base de datos
  static $connection;
  if ($connection===NULL){
      $connection = new mysqli($server, $user, $pass, $db);
  }
  $connection->set_charset("utf8");
  return $connection;
}
?>
