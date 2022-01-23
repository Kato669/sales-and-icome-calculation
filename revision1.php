<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="revision1.php" method="post">
    value 1:<input type="number" name="first_value"><br>
    value 2: <input type="number" name="second_value"><br>
    <input type="text" name="action">
    <input type="submit">
  </form>
  <?php
    $value1 = $_POST['first_value'];
    $value2 = $_POST['second_value'];
    $action = $_POST['action'];
    if($action == "+"){
      echo $value1+ $value2;
    }elseif($action == "-"){
      echo $value1-$value2;
    }elseif($action =="*"){
      echo $value1*$value2;
    }elseif($action =="/"){
      echo $value1/$value2;
    }else{
      echo 'invalid entry';
    }
  ?>
</body>
</html>