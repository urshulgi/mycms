<?php
include('./includes/connection.php');
include('./includes/functions.php');

$connection = dbConnection();
$url = substr($_GET["url"], 0, -1);
$sql = $connection->prepare("SELECT name, image, content, author, date FROM article WHERE link=?");
$sql->bind_param('s', $url);
$sql->execute();
$sql->bind_result($name, $image, $content, $author, $date);
$sql->fetch();
$sql->close();
if ($name == "") {
  header('Location: /404');
} else {
  include_once('./includes/header_index.php');
  echo "<head><link href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\"><link rel=\"stylesheet\" href=\"/css/styles.css\"></head>";
  $author = getAuthor($author);
  $date = gmdate("d-m-Y", $date);
  echo "<div id='container-articles'>";
  echo "<center>";
  echo "<div id='container-image-article'><img id='img-article' src='". $image . "'></div><br><br>";
  echo "<h1 id='top-title'>" . $name . "</h1><br><br>";
  echo "<div id='after-title' class='d-flex flex-row justify-content-between'>";
  echo "<p>Escrito por: " . $author . "</p>";
  echo "<p>Publicado el: " . $date . "</p>" ;
  echo "</div>";
  echo "<div id='container-content'>";
  echo $content . "<br><br>";
  echo "</div>";
  echo "</center>";
  echo "</div>";
  include_once('./includes/footer.php');
}

?>
