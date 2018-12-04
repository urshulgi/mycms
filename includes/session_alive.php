<?php
session_start();
if ($_SESSION['logged'] != "true") {
  header('Location: ../login');
} else {
  # Tiempo para cierre de sesión
  $inactive = 7200;
  # Comprobar si existe la sesión; si existe, se comprueba por cuanto tiempo
  # ha estado abierta, y si es mayor al tiempo de inactividad, se cierra.
  $check = isset($_SESSION['timeout']);
  if ($check == 1) {
    $session_life = time() - $_SESSION['timeout'];
    # Se destruye la sesión
    if($session_life > $inactive) {
      sessDestroy();
      header("Location: ../login.php");
    }
  }
  # Si la sesión está logeada, pero no existe un timeout, se destruye la sesión.
  # La sesión nunca debería estar sin timeout.
  else {
    sessDestroy();
    header('Location: ../login.php');
  }

}
?>
