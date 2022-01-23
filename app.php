<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'form';
$attempt = 0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $attempt = $_POST['hidden'];
    if($attempt <4){
    $query = "select * from formtable where username = '".$user."' and password = '".$pass."'";

    $result = mysqli_query($conn, $query);
    if($result){
        if(mysqli_num_rows($result)){
            while(mysqli_fetch_array($result, MYSQLI_BOTH)){
                echo '<script type="text/javascript">alert("login successfully")</script>';
            }
        }else{
            $attempt++;
            echo '<script type="text/javascript">alert("log in failed and number of login is '.$attempt.'")</script>';
        }
    }
}
}
?>