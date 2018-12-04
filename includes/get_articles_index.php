<?php
$connection = dbConnection();
$sql = $connection->query("SELECT COUNT(id) FROM article WHERE published=1");
$sql = $sql->fetch_row();
$totalarticles = $sql[0];
$sql->close;
$offset = 0;
// $artperpage define la cantidad de artículos por página. Interactúa con las
// queries y con genPages() para mostrar la cantidad de artículos exacta, y la
// cantidad de páginas exacta en base a la cantidad de artículos que se deben
// mostrar.
$artperpage = 12;
if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
  // Si en la URL se describe un número de página, se aplica a la variable $offset
  // restando 10 para que se puedan extraer la lista de artículos de la DB.
  // Se multiplica por 10 para obtener los siguientes 20, 40, 60 números de 20 en 20.
  if ($_GET["page"] > 1) {
    $offset = ($_GET["page"]*$artperpage)-$artperpage;
  }
}
?>
<div class="container justify-content-center">
  <div class="row">
    <?php
    $sql = $connection->query("SELECT name, image, link FROM article WHERE published=1 ORDER BY id DESC LIMIT $artperpage OFFSET $offset");
    $insertbreak = 0;
    while($row = $sql->fetch_assoc()) {
      if ($insertbreak == 3) {
        $insertbreak = 1;
        echo '<div class="w-100"></div>';
      } else {
        $insertbreak++;
      }
      echo "<a href='". $row['link'] ."' class='col-sm articlebox' style='background-image: url(\"".$row['image']."\");'>";
      echo '<p id="articletitle">' . $row["name"] . '</p>';
      echo '</a>';
    }
?>
  </div>
</div>
<?php
$numpages = genPages($totalarticles, $artperpage);
for ($i=0; $numpages > $i; $i++) {
  $valuebutton = $i+1;
  echo '<a class="btn btn-secondary btn-sm" role="button" href="?page='. $valuebutton .'" id="button">'. $valuebutton . '</a>';
}
$sql->close();
?>
