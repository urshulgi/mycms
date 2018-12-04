<?php
session_start();
include('./includes/connection.php');
include('./includes/functions.php');
$pagetitle = "Panel de ".$pagename;
?>
<body>
  <center>
    <?php include_once('./includes/header_index.php'); ?>
    <div class="justify-content-center vertical-center">
        <form id="login" method="post">
          <h1><?php echo $pagetitle; ?></h1><br><br>
          <p class="h4">Usuario</p><input type="text" id="username" name="username" class="form-control" required><br>
          <p class="h4">Contraseña</p><input type="password" id="password" name="psw" class="form-control" required><br>
          <br>
          <input type="submit" name="submit" id="send" class="btn btn-outline-primary" value="Ingresar">
          <br><br>
          <?php include('./includes/session_start.php'); ?>
        </form>
    </div>
  </center>
  <?php include('./includes/footer.php'); ?>
</body>
