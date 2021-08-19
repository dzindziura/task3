<?php
  if($_COOKIE['login'] == ''){
    header('Location: /auth.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'Добавляємо статтю';
    require 'blocks/head.php';
    ?>
</head>
<body>
  <?php require 'blocks/header.php' ?>
        <main class="container mt-5">
          <div class="row">
            <div class="col-md-8 mb-3">
              <h4>Добавляємо статтю</h4>
              <form action="" method="post">
                <label for="title">Тема</label>
                <input type="text" name="title" id="title" class="form-control">
                <label for="intro">Интро статті</label>
                <textarea name="intro" id="intro" class="form-control"></textarea>
                <label for="text">Текст статті</label>
                <textarea name="text" id="text" class="form-control"></textarea>
                <div class="alert alert-danger mt-2" id="errorBlock"></div>
                 <button type="button" id="article_send" class="btn btn-success mt-5">Добавити</button>
              </form>
            </div>
<?php require 'blocks/aside.php' ?>

          </div>
        </main>

  </div>
<?php require 'blocks/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#article_send').click(function(){
    var title = $('#title').val();
    var intro = $('#intro').val();
    var text = $('#text').val();

    $.ajax({
      url: 'ajax/add_article.php',
      type: 'POST',
      cache: false,
      data: {'title': title, 'intro': intro, 'text': text},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#article_send').text('Все готово');
          $('#errorBlock').hide();
          document.location.reload(true);
        }else{
          $('#errorBlock').show();
          $('#errorBlock').text(data);
        }
      }
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
