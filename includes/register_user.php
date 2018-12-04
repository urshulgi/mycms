<?php
$name = $_POST["fullname"];
$user = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["psw"];
$spass = $_POST["spsw"];
$role = $_POST["role"];

# Comprobar si las contraseñas coinciden, si los campos están vacíos
# y registrar o imprimir el error.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ( $pass != $spass ) {
    echo "<center>Las contraseñas no coinciden.</center>";
  } else if ( strlen($user) > 20 ) {
    echo "<center>El usuario no puede contener más de 20 caracteres.</center>";
  } else if ( strlen($name) > 50 ) {
    echo "<center>El nombre no puede contener más de 50 caracteres.</center>";
  } else if ( $name!='' and $user!='' and $pass!='' and $email!='' ) {
    if (registUser($name, $user, $pass, $role, $email)) {
       echo "<center>El usuario se ha registrado correctamente.</center>";
     } else {
       echo "<center>El usuario no se ha registrado.</center>";
     }
  }
}
?>
