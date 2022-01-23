<!DOCTYPE html>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sales';
$attempt = 0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $attempt = $_POST['hidden'];
    if($attempt <4){
    $query = "select * from sales where username = '".$user."' and password = '".$pass."'";

    $result = mysqli_query($conn, $query);
    if($result){
        if(mysqli_num_rows($result)){
            while(mysqli_fetch_array($result, MYSQLI_BOTH)){
                echo '<script type="text/javascript">alert("welcome back '.$user.'")</script>';
                ?>

                <script>
                    window.location.href = "welcome.html";
                </script>
                <?php
            }
        }else{
            $attempt++;
            echo '<script type="text/javascript">alert("log in failed and number of attempt is '.$attempt.'")</script>';
        }
    }
}else{
    echo '<script type="text/javascript">alert("attempt done")</script>';
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT specialists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        input[type='submit']{
            margin: 5px;
            display: block;
            width: 85%;
            margin-left: 30px;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all .5s;

        }
        input[type='submit']:hover{
            background: grey;
        } 
        .txt{
            color : #fff;
            font-size: 1.4rem;
            padding-left: 20px;
        }
    </style>
    <link rel="shortcut icon" href="ICT_Logo-01.png">
</head>
<body>

    <form action="" method = 'post'>
        <div class="top">
            <p>&copy; <span class="span"></span> ICT specialists</p>
        </div>
        <table align="center">
            <div class="middle">
                <h1>Identify yourself</h1> 
            </div>
            <?php
            echo '<input type="hidden" name="hidden" value='.$attempt.'>';
            ?>
            <tr>
                <td class='txt'>username</td>
                <td><input type="text" name="username" id="" <?php if($attempt ==4){?> disabled = 'disabled' <?php }?> placeholder="username"></td>
            </tr>
            <tr>
                <td class='txt'>password</td>
                <td><input type="password" name="password" id="" placeholder="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" <?php if($attempt ==4){?> disabled = 'disabled' <?php }?> value='login'></td>
            </tr>
        </table>
    </form>
    
    <script src="../js/app.js"></script>
</body>
</html>