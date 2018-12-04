<?php
# Cerrar la sesión y redirigir a la página de logeo
include('../includes/functions.php');
session_start();
if ($_SESSION['logged'] == "true") {
  sessDestroy();
  header('Location: ../login.php');
} else {
  header('Location: ../login.php');
}
?>
