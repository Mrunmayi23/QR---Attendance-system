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
    $filename = 'AttendanceRecord-'.date('Y-m-d').'.csv';

    $query = "SELECT * FROM qrcodedb";
    $result = mysqli_query($conn,$query);

    $array = array();
    $file = fopen($filename,"w");
    $array = array("Id","Username","time_in","time_out","logdate","status");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
        $Id = $row['Id'];
        $Username = $row['Username'];
        $time_in = $row['time_in'];
        $time_out = $row['time_out'];
        $logdate = $row['logdate'];
        $status = $row['status'];

        $array = array($Id,$Username,$time_in,$time_out,$logdate,$status);
        fputcsv($file,$array);

    }
    fclose($file);

    header("Content-Discription: File Transfer");
    header("Content-Disposition: Attatchment; filename=$filename");
    header("Content-type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();

?>