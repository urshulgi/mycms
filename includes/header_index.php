<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <title> Bienvenido a <?php echo $pagename; ?></title>
</head>
<center>
  <div class="header-top-container container-fluid">
    <div id="header-top" class="d-flex justify-content-between w-75">
      <p id="date">Hoy es <?php setlocale(LC_ALL,"es_ES"); echo strftime("%A %d de %B del %Y"); ?></p>
      <a type="button" id="button-panel" href="panel">Ir al panel</a>
    </div>
  </div>
  <div class="header-index container-fluid">
    <div id="header-container" class="justify-content-center w-75 p-3">
      <img id="logo" src="/images/logo-mycms.png" alt="Logo MyCMS" href="/">
    </div>
  </div>
  <div class="header-menu-container container-fluid">
    <div id="header-menu" class="justify-content-center w-75 h-100">
      <a type="button" href="/">Inicio</a>
      <a type="button" href="#">Contacto</a>
      <a type="button" href="#">Acerca de MyCMS</a>
    </div>
  </div>
</center>
