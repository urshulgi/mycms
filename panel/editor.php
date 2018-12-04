<?php
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/session_alive.php');
if ($_SESSION['permission'] > 3) {
  header('Location: ./index.php');
} else {
  $pagetitle = "Editor de ".$pagename;
  if ( $_SERVER['REQUEST_METHOD'] != 'POST' ) {
    if (!$_GET["id"]) {
      $_SESSION["id-article"] = NULL;
    } else if ($_GET["id"]) {
      $_SESSION["id-article"] = $_GET["id"];
    }
  }
}
?>
  <head>
    <script src='../js/tinymce/tinymce.min.js'></script>
    <script src='../js/new_article.js'></script>
  </head>
    <?php include_once('../includes/header_panel.php'); ?>
    <?php include('../includes/check_article.php'); ?>
    <center>
    <?php if(isset($_GET['deleted'])){echo "<br><center><p id='deleted'>El artículo ha sido borrado.</p></center>";}?>
    <br>
      <div class="justify-content-center w-75 p-3" id="contenedor">
        <form method="post">
          <input type="text" id="name-article" name="name-article" class="w-100 form-control"
          placeholder="Nombre del artículo"
          value="<?php if (isset($_POST['name-article'])) {echo $_POST['name-article'];} ?>"
          autofocus required>
          <br><br>
          <input type="text" id="link-article" name="link-article"  class="w-100 form-control"
          name="link"  placeholder="Link"
          value="<?php if (isset($_POST['link-article'])) {echo $_POST['link-article'];} ?>"
          required>
          <br><br>
          <textarea id="article" name="article" placeholder="Escribe aquí tu artículo">
          <?php if(isset($_POST['article'])) {  echo htmlentities ($_POST['article']); }?>
        </textarea>
          <br>
          <input type="text" id="image-article" name="image-article" class="w-100 form-control"
          placeholder="Link de la imagen (El tamaño recomendado es de 1000x500 pixeles)"
          value="<?php if (isset($_POST['image-article'])) {echo $_POST['image-article'];} ?>"
          autocomplete="off" required>
          <br><br>
          <input type="radio" name="publish" value="1" <?php if(isset($_POST['publish'])){if($_POST['publish']==1){echo 'checked';}} ?> required> Publicar
          <input type="radio" name="publish" value="0"  <?php if(isset($_POST['publish'])){if($_POST['publish']==0){echo 'checked';}} ?> required> No publicar
          <br><br>
          <input type="submit" class="btn btn-outline-primary btn-lg" name="send" value="Guardar cambios">
          <?php if(isset($_SESSION["id-article"])){echo '<button type="button" class="btn btn-outline-danger btn-lg" data-toggle="modal" data-target="#deleteModal">Borrar artículo</button>';} ?>
        </form>
      </div>
      <!-- Modal confirmación borrar-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">¿Realmente quieres borrar el artículo?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              No habrá forma de recuperar la información del artículo una vez que confirmes su borrado.<br>¿Realmente quieres borrarlo?
            </div>
            <div class="modal-footer">
              <form method="post">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No quiero borrarlo</button>
                <input type="submit" class="btn btn-outline-danger" id="delete-article" name="delete-article" value="Borrarlo permanentemente"></form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal confirmación borrar-->
    </center>
    <?php include('../includes/register_article.php'); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js" ></script>
    <?php include('../includes/footer.php'); ?>
