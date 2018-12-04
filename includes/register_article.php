<?php
$name = $_POST["name-article"];
$link = $_POST["link-article"];
$image = $_POST["image-article"];
$content = $_POST["article"];
$author = $_SESSION["username"];
$publish = $_POST["publish"];
$date = time();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  # Comprobación de nombre y link vacío
  if ( $name == "" or $link == "") {
    echo "<center>No puedes dejar campos vacíos</center>";
  } else if (isset($_POST["delete-article"])) {
    $id = $_GET["id"];
    if (deleteArticle($id)) {
      header('Location: ./editor?deleted=1');
    } else {
      echo "<center>Ha ocurrido un error y no se ha borrado el artículo. Inténtalo de nuevo.</center>";
    }
  } else {
    # Comprobación de imagen
    $newimage = filter_var($image, FILTER_SANITIZE_URL);
    $checkarray = getimagesize($newimage);
    if (count($checkarray) > 1) {
      # Comprobación de botón pulsado
      if ( $publish === '0' ) {
        $published = 0;
      } else if ( $publish === '1' ) {
        $published = 1;
      }
      # Comprobación de artículo registrado
      session_start();
      if (isset($_SESSION["id-article"])) {
        $idarticle = $_SESSION["id-article"];
      } else {
        $idarticle = FALSE;
      }
      $checkregister = registArticle($idarticle, $name, $link, $newimage, $content, $author, $date, $published);
      if ( $checkregister > 0 ) {
        $_SESSION["id-article"] = $checkregister;
        echo "<center>Artículo creado.</center>";
      } else if ($checkregister == 'Actualizado') {
        echo "<center>Artículo actualizado.</center>";
      } else if ($checkregister == 'Error'){
        echo "<center>No se guardó el artículo.</center>";
      }
    } else {
      echo "<center>El link de la imagen no es válido. Debes ingresar el link de una imagen.</center>";
    }
  }
}
?>
