<?php

session_start();

?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/lib/webtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
                <?php 

                if(isset($_SESSION['error'])){
                    echo"
                      <div class='alert alert-danger'>
                      <h4>Error!</h4>
                      ".$_SESSION['error']."
                      </div>
                    ";
                }

                if(isset($_SESSION['success'])){
                    echo"
                      <div class='alert alert-success'>
                      <h4>Success!</h4>
                      ".$_SESSION['success']."
                      </div>
                    ";
                }
                
                
                ?>
            </div>
            <div class="col-md-6">
                <form action="insert.php" method="post" class="form-horizontal">
                    <label>scan qr code</label>
                    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                </form>
                   <table class="table table-border">
                       <thead>
                           <tr>
                           <td>ID</td>
                           <td>Username</td>
                           <td>Time In</td>
                           <td>Time out</td>
                           <td>logdate</td>
                           <td>status</td>
                         </tr>
                       </thead>
                       <tbody>

                       <?php

                        $server="localhost";
                        $username="root";
                        $password="";
                        $dbname="login_register";

                        $conn = new mysqli($server, $username, $password, $dbname);
                        $date = date('Y-m-d');

                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                        $sql ="SELECT Id,Username,time_in,time_out,logdate,status FROM qrcodedb WHERE DATE(time_in) = CURDATE() AND DATE(time_out) = CURDATE() ";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['Id']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td><?php echo $row['time_in']; ?></td>
                            <td><?php echo $row['time_out']; ?></td>
                            <td><?php echo $row['logdate']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                       </tbody>
                   </table>
            </div>
        </div>
        <br>
            <button type="submit" class="btn btn-success pull-right" onclick="Export()">

                <i class="fa fa-file-excel-o fa-fw" ></i>Export to Excel
            </button>
    </div>

    <script>
        function Export()
        {
            var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in excel file");
            if(conf === true)
            {
                window.open("export.php",'_blank');
            }
        }
    </script>

    <script>
        let scanner =new Instascan.Scanner({video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            }else{
                alert('No cameras found');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan',function(c){
            document.getElementById('text').value=c;
            document.forms[0].submit();
        });

       

    </script>

    
</body>
</html>