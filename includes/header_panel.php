<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title><?php echo $pagetitle; ?></title>
</head>
<body id="bodypanel">
  <div class="container-fluid h-100">
    <div class="row h-100">
      <aside class="col-md col-md-2 p-0 bg-dark" id="lateral-panel">
        <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start">
          <div class="collapse navbar-collapse w-100">
            <ul class="pd-3 flex-md-column flex-row navbar-nav w-100 justify-content-between">
              <li id="container-logo">
                  <a href="/">
                    <p id="logo-panel"></p>
                  </a>
              </li>
              <li class="nav-item">
                <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/" id="index">Página principal</a>
              </li>
              <li class="nav-item">
                <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/" id="index">Inicio</a>
              </li>
              <li class="nav-item">
                <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/articles_list" id="change">Editar artículo</a>
              </li>
              <li class="nav-item">
                  <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/editor" id="change">Nuevo artículo</a>
              </li>
              <li class="nav-item">
                  <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/password_change" id="change">Cambiar contraseña</a>
              </li>
              <li class="nav-item">
                  <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/session_close" id="logout">Cerrar sesión</a>
              </li>
              <?php
              if ($_SESSION['permission'] < 2) {
                echo '<li class="sub-menu-title">
                  <p id="sub-menu-title">Administración</p>
                </li>
                <li class="nav-item">
                    <a id="nbtn-secondary" class="nbtn btn btn-secondary" role="button" href="/panel/register" id="register">Registrar usuario</a>
                </li>';
              }
              ?>
            </ul>
          </div>
        </nav>
      </aside>
      <main class="d-flex justify-content-center align-items-center flex-column col-lg-10">
        <h1><?php echo $pagetitle; ?></h1>
        <div class="w-100">
