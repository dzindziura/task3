<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'PHP blog';
   require 'blocks/head.php';
    ?>
</head>
<body>
  <?php require 'blocks/header.php' ?>
        <main class="container mt-5">
          <div class="row">
            <div class="col-md-8 mb-3">

                          <?php
                            require 'mysql_connect.php';

                            $query = $pdo->query('SELECT * FROM `articles` ORDER BY `date` DESC');
                            while($row = $query->fetch(PDO::FETCH_OBJ)){
                              echo "<h2>Тема:$row->title</h2>
                            <p><b>Intro:</b>$row->intro</p>
                            <p><b>Avtor:</b><mark>$row->avtor</mark></p>
                            <a href='/news.php?id=$row->id'><button class='btn btn-warning mb-5'>Прочитати більше</button></a>";
                            }
                           ?>
            </div>
<?php require 'blocks/aside.php' ?>

          </div>
        </main>

  </div>
<?php require 'blocks/footer.php' ?>

<?php
$i = 4;
$str = "54,23,2,$i,7,2";
$arr = explode(",", $str);
$k = sizeof($arr);
for($i=0;$i<$k-1;$i++){
    for($j=0;$j<$k-$i-1;$j++){
        if($arr[$j]>$arr[$j+1]){
            $zam = $arr[$j];
             $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $zam;
        }
    }
}
 for($i = 0;$i < $k; $i++) {
        echo $arr[$i]." ";
    }
?>
</body>
</html>
