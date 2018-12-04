<?php
$pagename = "MyCMS"; # El nombre de la página. Usado globalmente.
date_default_timezone_set("Europe/Madrid"); # La zona horaria.

# ~~~~ logUser: ~~~~
# Recibe  el usuario y la contraseña para encriptarlo y comprobar el inicio.
# Retorna el rango del usuario si las contraseñas son iguales.
# Retorna FALSE si son distintas.
# Utiliza la conexión de connection.php
function logUser($username, $password) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT password, role FROM user WHERE nick=?");
  $sql->bind_param('s', $username);
  $sql->execute();
  $sql->bind_result($storedpassword, $storedrole);
  $sql->fetch();
  $sql->close();
  if (password_verify($password, $storedpassword)) {
    return $storedrole;
  } else {
    return False;
  }
}

# ~~~~ registUser: ~~~~
# Registra el usuario ingresado en register.php utilizando la conexion
# que se trae de connection.php.
# Verifica si el nombre de usuario existe; si existe, devuelve FALSE.
# Verifica si el email existe; si existe, devuelve FALSE.
# Si no existen, encripta la contraseña del usuario, luego
# envía todo el registro a la base de datos y devuelve TRUE.
# Si no se ejecuta, devuelve el error y FALSE.
# Utiliza la conexión de connection.php
function registUser($fullname, $username, $password, $role, $email) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT nick, email FROM user WHERE nick=? OR email=?");
  $sql->bind_param('ss', $username, $email);
  $sql->execute();
  $sql->bind_result($storeduser, $storedemail);
  $sql->fetch();
  $sql->close();
  if ($storeduser == $username) {
    echo "<center>El usuario ya existe. Utiliza uno distinto.</center>";
    return False;
  } else if ($storedemail == $email) {
    echo "<center>El email ya está registrado. Utiliza uno distinto.</center>";
    return False;
  } else {
    $hashed = password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]);
    $sql = $connection->prepare("INSERT INTO user (name, nick, password, role, email) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('sssis', $fullname, $username, $hashed, $role, $email);
    if ($sql->execute() === TRUE) {
        $sql->close();
        return True;
      } else {
        $sql->close();
        echo "<center>Error al registrar el usuario: <br>".$sql->error."</center>";
        return False;
      }
  }
}

# ~~~~ getAuthor: ~~~~
# Recibe el parámetro $id: ID de un usuario.
# Devuelve el NOMBRE COMPLETO del usuario (No su username).
# Utiliza la conexión de connection.php
function getAuthor ($id) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT name FROM user WHERE id=?");
  $sql->bind_param('s', $id);
  $sql->execute();
  $sql->bind_result($name);
  $sql->fetch();
  $sql->close();
  return $name;
}

# ~~~~ getAuthorId: ~~~~
# Usada en registArticle()
# Recibe el parámetro $nick: Nombre de usuario.
# Devuelve el id del usuario pasado.
# Utiliza la conexión de connection.php
function getAuthorId ($nick) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT id FROM user WHERE nick=?");
  $sql->bind_param('s', $nick);
  $sql->execute();
  $sql->bind_result($id);
  $sql->fetch();
  $sql->close();
  return $id;
}

# ~~~~ checkLink: ~~~~
# Recibe el parámetro $link: El link que se generó automáticamente para el artículo.
# Comprueba si el link ya existe en la base de datos, y si existe, crea uno nuevo.
# Genera el nuevo link a partir del último id creado.
# Devuelve la cadena con le nuevo link.
# Utiliza la conexión de connection.php
function validateLink($link) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT link FROM article WHERE link=?");
  $sql->bind_param('s', $link);
  $sql->execute();
  $sql->bind_result($extractedlink);
  $sql->fetch();
  $sql->close();
  if ($link == $extractedlink);
    $sql = $connection->query("SELECT id FROM article ORDER BY id DESC LIMIT 1");
    $sql = $sql->fetch_row();
    $idlastarticle = $sql[0];
    $newlink = $link . $idlastarticle;
    return $newlink;
}

# ~~~~ registArticle: ~~~~
# Registra el artículo en la base de datos o lo actualiza si ya existe su ID.
# Devuelve FALSE si existe algún error al crear el artículo, y devuelve el error
# como echo.
# Devuelve el ID del artículo si se registra exitosamente.
# Devuelve 'Actualizado' si se actualiza el artículo existente exitosamente.
# Devuelve 'Error' si no se actualiza correctamente el artículo existente.
# Utiliza la conexión de connection.php
function registArticle($idarticle, $name, $link, $image, $content, $author, $date, $published) {
  $idauthor = getAuthorId($author);
  $connection = dbConnection();
  $link = validateLink($link);
  if ($idarticle === FALSE) {
    $sql = $connection->prepare("INSERT INTO article
      (name, image, content, author, date, link, published)
      VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param('sssiisi', $name, $image, $content, $idauthor, $date, $link, $published);
    if ($sql->execute() === TRUE) {
      $id = $sql->insert_id;
      $sql->close();
      return $id; # Id nuevo artículo
    } else {
      echo "<center>Error al guardar: ".$sql->error."</center>";
      return False;
    }
  } else if ($idarticle > 0) {
    $sql = $connection->prepare("UPDATE article SET name=?, image=?, content=?,
       link=?, published=? WHERE id=?");
    $sql->bind_param('ssssii', $name, $image, $content, $link, $published,
      $idarticle);
    if ($sql->execute() === TRUE) {
      $sql->close();
      return 'Actualizado'; # Artículo actualizado
    } else {
      echo "<center>Error al guardar: ".$sql->error."</center>";
      return 'Error';
    }
  }
}

# ~~~~ deleteArticle: ~~~~
# Recibe el parámetro $id: Un ID de artículo ya existente.
# Elimina un artículo de la base de datos.
# Devuelve TRUE si se elimina correctamente el artículo.
# Devuelve FALSE si no se elimina el artículo.
# Utiliza la conexión de connection.php
function deleteArticle($id) {
  $connection = dbConnection();
  $sql = $connection->prepare("DELETE FROM article WHERE id=?");
  $sql->bind_param('i', $id);
  if ($sql->execute()) {
    $sql->close();
    return TRUE;
  } else {# Utiliza la conexión de connection.php
    $sql->close();
    return FALSE;
  }
}

# ~~~~ genPages ~~~~
# Recibe los parámetros:
# $totalarticles: Los artículos totales, publicados o no. Este parámetro se decide
# directamente en la página desde donde se llama la función, en el encabezado.
# $artperpage: Los artículos que se quieren mostrar por cada página. Este parámetro
# se decide directamente en la página desde donde se llama la función, en el encabezado.
# Genera la cantidad de páginas, que sirve para generar la cantidad de botones.
# Se utiliza en la página principal y en la lista de artículos del panel.
# Retorna el número de páginas si su valor calculado es mayor a 1, y retorna
# 0 si el valor es menor a 1.
function genPages($totalarticles, $artperpage) {
  $numpages = ceil($totalarticles / $artperpage);
  if ($numpages > 1) {
    return $numpages;
  } else {
    return 0;
  }
}

# ~~~~ changePassw: ~~~~
# Cambia la contraseña del usuario.
# Verifica si la contraseña introducida es correcta. Si lo es, encripta la
# nueva contraseña y actualiza el registro con la nueva contraseña.
# Retorna TRUE si la contraseña se registra.
# Retorna FALSE si existe un error al hacer el registro, y también retorna
# FALSE si la contraseña original introducida es incorrecta.
# Utiliza la conexión de connection.php
function changePassw($username, $password, $newpassword) {
  $connection = dbConnection();
  $sql = $connection->prepare("SELECT password FROM user WHERE nick=?");
  $sql->bind_param('s', $username);
  $sql->execute();
  $sql->bind_result($storedpassword);
  $sql->fetch();
  $sql->close();
  if (password_verify($password, $storedpassword)) {
    $hashed = password_hash($newpassword, PASSWORD_DEFAULT, ["cost" => 10]);
    $sql = $connection->prepare("UPDATE user SET password = ? WHERE nick = ?");
    $sql->bind_param('ss', $hashed, $username);
    if ($sql->execute() === TRUE) {
        $sql->close();
        return True;
      } else {
        echo "<center>Error al cambiar la contraseña: <br>".$sql->error."</center>";
        $sql->close();
        return False;
      }
  } else {
    echo "<center>La contraseña introducida es incorrecta.</center>";
    return False;
  }
}

# ~~~~ sessDestroy: ~~~~
# Destruye la sesión actual. No retorna valores.
# Se utiliza en session_close.php
function sessDestroy() {
  $_SESSION['logged'] == "false";
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
}
?>
