<?php
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/session_alive.php');
if ($_SESSION['permission'] > 4) {
  header('Location: ./index.php');
} else {
  $pagetitle = "Cambio de contraseñas de ".$pagename;
}
?>
<?php include_once('../includes/header_panel.php'); ?>

  <center>
    <br>
    <br>
    <form id="changepw" class="w-50" method="post" >
      <input type="password" id="password" class="form-control" name="psw" placeholder="Contraseña actual" required><br>
      <input type="password" id="passwordnew" class="form-control" name="pswn" placeholder="Nueva contraseña" autocomplete="off" required><br>
      <input type="password" id="spassword" class="form-control" name="spsw" placeholder="Repetir nueva contraseña" autocomplete="off" required><br>
      <br>
      <br>
      <input type="submit" id="send" class="btn btn-outline-primary btn-lg" value="Cambiar contraseña">
      <br><br>
      <?php include('../includes/change_password.php'); ?>
    </form>
  </center>
    <?php include('../includes/footer.php'); ?>
