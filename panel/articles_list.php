<?php
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/session_alive.php');
if ($_SESSION['permission'] > 3) {
  header('Location: ./index.php');
} else {
  $pagetitle = "Artículos publicados en ".$pagename;
}
?>
<body id="bodypanel">
    <?php include_once('../includes/header_panel.php'); ?>
        <?php include_once('../includes/get_articles_panel.php'); ?>
    <?php include('../includes/footer.php'); ?>
