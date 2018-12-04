<?php
include('../includes/functions.php');
include('../includes/session_alive.php');
$pagetitle = "Panel de ".$pagename;

?>
  <body id="bodypanel">
    <?php include_once('../includes/header_panel.php'); ?>
    <center>
      <br>
      <h3>¡Bienvenido <?php echo $_SESSION['fullname'] ?>!</h3>
    </center>
    <?php include('../includes/footer.php'); ?>
