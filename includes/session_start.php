<?php
if (isset($_POST['submit'])) {
  $user = $_POST["username"];
  $pass = $_POST["psw"];

  if ($user != '' and $pass != '') {
    $checkup = logUser($user, $pass);
    # Sucede si la contraseña es correcta
    if ($checkup > 0) {
      session_start();
      $_SESSION['logged'] = "true";
      $_SESSION['permission'] = $checkup;
      $_SESSION['username'] = $user;
      $_SESSION['timeout'] = time();
      $_SESSION['fullname'] = getAuthor(getAuthorId($user));
      header('Location: ./panel/index.php');
    }
    # Sucede si la contraseña es incorrecta
    else if ($checkup == False) {
      echo "Contraseña o usuario incorrecto.";
    }
  }
} else if ($_SESSION['logged'] == "true") {
  header('Location: ./panel/index.php');
}
?>
