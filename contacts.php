<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'Зворотрій звязок';
    require 'blocks/head.php';
    ?>
</head>
<body>
  <?php require 'blocks/header.php' ?>
        <main class="container mt-5">
          <div class="row">
            <div class="col-md-8 mb-3">
              <h4>Зворотній звязок</h4>
              <form action="" method="post">
                <label for="username">Ваше ім'я</label>
                <input type="text" name="username" id="username" class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="mess">Повідомлення</label>
                <textarea name="mess" id="mess" class="form-control"></textarea>

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                 <button type="button" id="mess_send" class="btn btn-success mt-5">Відправити повідомлення</button>
              </form>
            </div>
<?php require 'blocks/aside.php' ?>

          </div>
        </main>

  </div>
<?php require 'blocks/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#mess_send').click(function(){
    var name = $('#username').val();
    var email = $('#email').val();
    var login = $('#mess').val();

    $.ajax({
      url: 'ajax/mail.php',
      type: 'POST',
      cache: false,
      data: {'username' : name, 'email' : email, 'mess' : mess},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#mess_send').text('Все готово');
          $('#errorBlock').hide();
          $('#username').val("");
          $('#email').val("");
          $('#mess').val("");
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
