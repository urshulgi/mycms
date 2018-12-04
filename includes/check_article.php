<?php
if (!$_POST["send"]) {
  // Revisa si existe el id-article. Funciona cuando se va a editar un artículo
  // clickado en la lista por el usuario.
  // El $_SESSION["id-article"] es captado en editor.php cuando se detecta el
  // método GET.
  // Esto sucede sólo cuando $_POST["send"] no es pasado desde el mismo editor.
  // $_POST["send"] no es pasado si se viene desde la lista de artículos.
  if ($_SESSION["id-article"]) {
    $connection = dbConnection();
    $idarticle = $_SESSION["id-article"];
    $sql = $connection->query("SELECT * FROM article WHERE id=$idarticle");
    $sql = $sql->fetch_assoc();
    $_POST["name-article"] = $sql["name"];
    $_POST["link-article"] = $sql["link"];
    $_POST["article"] = $sql["content"];
    $_POST["image-article"] = $sql["image"];
    $_POST["publish"] = $sql["published"];
  }
}
?>
