<?php
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error='';

  if(strlen($username) <= 3)
    $error = 'Введіть ім\'я';
  else if(strlen($email) <=3)
    $error = 'Введіть email';
  else if(strlen($login) <=3)
    $error = 'Введіть login';
  else if(strlen($pass) <=3)
    $error = 'Введіть пароль';

    if($error!=''){
      echo $error;
      exit();
    }

    $hash = "sdfsdfdgafdgsfsfg";
    $pass = md5($pass . $hash);

    require_once '../mysql_connect.php';

    $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username,$email,$login,$pass]);

    echo "Готово";
 ?>
