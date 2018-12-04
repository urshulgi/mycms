<?php
$connection = dbConnection();
$sql = $connection->query("SELECT COUNT(id) FROM article");
$sql = $sql->fetch_row();
$totalarticles = $sql[0];
$sql->close;
$offset = 0;
$artperpage = 10;
if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
  // Si en la URL se describe un número de página, se aplica a la variable $offset
  // restando 10 para que se puedan extraer la lista de artículos de la DB.
  // Se multiplica por $artperpage para obtener los siguientes 10, 20, 30 números de 10 en 10.
  if ($_GET["page"] > 1) {
    $offset = ($_GET["page"]*$artperpage)-$artperpage;
  }
}
?>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Autor</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
<?php

$sql = $connection->query("SELECT * FROM article ORDER BY id DESC LIMIT $artperpage OFFSET $offset");
while($row = $sql->fetch_assoc()) {
  $nameauthor = getAuthor($row["author"]);
  echo '<tbody>';
  echo '<tr>';
  echo '<th style="width: 50%" scope="row"><a href="./editor?id='. $row["id"]. '">' . $row["name"] . '</a></th>';
  echo '<td style="width: 30%">' . $nameauthor . '</td>';
  echo '<td style="width: 10%">' . gmdate("d-m-Y", $row["date"]) . '</td>';
  if ($row["published"] == 1) {
    echo '<td style="width: 10%">Publicado</td>';
  } else {
    echo '<td style="width: 10%">No publicado</td>';
  }
}
?>
</table>
<?php
$numpages = genPages($totalarticles, $artperpage);
for ($i=0; $numpages > $i; $i++) {
  $valuebutton = $i+1;
  echo '<a class="btn btn-secondary btn-sm" role="button" href="?page='. $valuebutton .'" id="button">'. $valuebutton . '</a>';
}
$sql->close();
?>
