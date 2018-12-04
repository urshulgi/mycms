<?php
$user = $_SESSION["username"];
$pass = $_POST["psw"];
$passn = $_POST["pswn"];
$spass = $_POST["spsw"];
 # Comprobar si los campos están vacíos y si las contraseñas son iguales.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 if ( $pass!='' and $passn!='' and $spass!='' ) {
   if ($passn == $spass) {
     if (changePassw($user, $pass, $passn)) {
        echo "<center>Se ha cambiado la contraseña.</center>";
      } else {
        echo "<center>No se ha cambiado la contraseña.</center>";
      }
   } else {
    echo "<center>Las nuevas contraseñas no coinciden. Inténtalo de nuevo.</center>";
   }
 }
}
?>
