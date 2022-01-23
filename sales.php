<?php
    $date = $_POST['date'];
    $item = $_POST['item'];
    $amount = $_POST['amount'];
    //database connection
    $conn = new mysqli ('localhost','root','','sales');
    if ($conn->connect_error) {
        die('connection failed: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare('insert into transactions(date,item,amount) value(?,?,?)');
        $stmt->bind_param('ssi',$date,$item,$amount);
        $stmt->execute();
        echo 'registration succesfully';
        $stmt->close();
        $conn->close();
    };
?>