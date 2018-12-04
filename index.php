<?php
include('./includes/functions.php');
include('./includes/connection.php');
?>
<?php include_once('./includes/header_index.php'); ?>
<body>
  <center>
  <div class="justify-content-center w-75 p-3" id="contenedor">
    <?php include_once('./includes/get_articles_index.php'); ?>
  </div>
  </center>
  <?php include_once('./includes/footer.php'); ?>
</body>
