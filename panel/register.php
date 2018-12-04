<?php
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/session_alive.php');
if ($_SESSION['permission'] > 2) {
  header('Location: ./index.php');
} else {
  $pagetitle = "Registro de usuarios de ".$pagename;
}
?>
    <?php include_once('../includes/header_panel.php'); ?>
    <center>
      <br>
      <br>
      <div class="justify-content-center w-75 p-3" id="contenedor">
        <form id="register" method="post" class="w-50">
          <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Nombre" autofocus required><br>
          <input type="text" id="username" class="form-control" name="username" placeholder="Usuario" required><br>
          <input type="email" id="email" class="form-control" placeholder="Correo electrónico" name="email" required><br>
          <input type="password" id="password" class="form-control" name="psw" placeholder="Contraseña" required><br>
          <input type="password" id="spassword" class="form-control" name="spsw" placeholder="Repetir contraseña" autocomplete="off" required><br>
          <select id="role" class="form-control" name="role" required>
            <option disabled selected>Rol</option>
            <option value="4">Usuario</option>
            <option value="3">Editor</option>
            <option value="2">Moderador</option>
            <option value="1">Administrador</option>
          </select><br>
          <br>
          <input type="submit" id="send" class="btn btn-outline-primary btn-lg" value="Registrar">
          <br><br>
          <?php include('../includes/register_user.php'); ?>
        </form>
      </div>
    </center>
    <?php include('../includes/footer.php'); ?>
