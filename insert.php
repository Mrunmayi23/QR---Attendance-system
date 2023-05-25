<?php

    session_start();
   
    $server="localhost";
    $username="root";
    $password="";
    $dbname="login_register";

    $conn = new mysqli($server, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['text'])){

        $text =$_POST['text'];
        $date = date('Y-m-d');
        $time = date('H-i-s');

        $sql="SELECT * FROM `qrcodedb` WHERE username='$text' AND logdate='$date' AND status='0' ";
        $query = $conn->query($sql);
        if($query->num_rows>0){
            $sql = "UPDATE qrcodedb SET time_out = NOW(), status='1' WHERE username = '$text' AND logdate='$date' ";
            $query = $conn->query($sql);
            $_SESSION['success'] = 'successfully added time out';
        }else{
            $sql = "INSERT INTO qrcodedb(username, time_in, logdate,status) VALUES('$text','$time','$date','0')";

           if($conn->query($sql) ===TRUE){
                $_SESSION['success'] = 'successfully added time in';
            } else{
                $_SESSION['error'] = $conn->error;
            }
        }

        //    $sql = "INSERT INTO qrcodedb(username, time_in) VALUES('$text',NOW())";

        //    if($conn->query($sql) ===TRUE){
                // echo "Successfully Inserted time in";
            // } else{
                // echo "Error: " . $sql . "<br>" . $conn->error;
            // }
        

    }else{
        $_SESSION['error'] = 'Please scan your qr code';
    }
    header("location: finalqrscan.php");

    $conn->close();


?>