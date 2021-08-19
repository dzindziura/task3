<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    require 'mysql_connect.php';
    $sql = ('SELECT * FROM `articles` WHERE `id`=:id');
    $id = $_GET['id'];
    $query = $pdo->prepare($sql);
    $query->execute(['id'=>$_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
     require 'blocks/head.php';
   ?>
</head>
<body>
  <?php require 'blocks/header.php' ?>
        <main class="container mt-5">
          <div class="row">
            <div class="col-md-8 mb-3">
              <div class="jumbotron" id="class1">
                <h1>
                  <?=$article->title?>
                </h1>
              <b>Автор тексту:</b> <mark><?=$article->avtor?></mark>
              <?php
              $date = date('d ', $article->date);
              $array = ["січня","лютого","березня","квітня","травня","червня","липня","серпня","вересня","жовтня","листопада","грудня"];
              $date .= $array[date('n', $article->date)-1] ;
              $date .= date(' H:i', $article->date );
               ?>
               <p> <b>Дата публікації:</b> <u><?=$date?></u> </p>
                <p>
                  <?=$article->intro?>
                  <br>
                  <?=$article->text?>
                </p>

              </div>

              <h3 class="mt-5">Коментарій</h3>
              <form action="/news.php?id=<?=$_GET['id']?>" method="post">
                <label for="username">Ваше ім'я</label>
                <input type="text" name="username" value="<?=$_COOKIE['login']?>" id="username" class="form-control">
                <label for="mess">Повідомлнення</label>
                <textarea name="mess" id="mess" class="form-control"></textarea>

                 <button type="submit" id="mess_send" class="btn btn-success mt-5">Добавити</button>
              </form>
              <?php
                if($_POST['username'] != '' && $_POST['mess'] != ''){
                  $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
                  $query = $pdo->prepare($sql);
                  $query->execute([$username, $mess, $_GET['id']]);
                }

                $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
                $query = $pdo->prepare($sql);
                $query->execute(['id' => $_GET['id']]);
                $comments = $query -> fetchAll(PDO::FETCH_OBJ);

                foreach ($comments as $comment) {
                  echo "<div class='alert alert-info mb-2'>
                  <h4>$comment->name</h4>
                  <p>$comment->mess</p>
                  </div>";
                }
               ?>
          </div>
<?php require 'blocks/aside.php' ?>

          </div>
        </main>


<?php require 'blocks/footer.php' ?>
</body>
</html>
