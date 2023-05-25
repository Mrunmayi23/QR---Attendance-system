<?php

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet1" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto:wght@300&family=Sansita&family=Vollkorn:ital@1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome after login</title>
    
</head>
<body style="background-color: #142850; ">
    <!--?php echo "<h1>welcome" . $_SESSION['username'] . "</h1>"; ?-->
    

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: gold;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Attendancekit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage1.php">logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Second">Create Class</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="second" id="second" style="padding: 50px;" >

        <div class="row" >

            <div class="column" style="width: 18rem; " >
                 <div class="card" style="padding: 30px; border-radius: 24px;">
                     <img src="93061-check-list-manual.gif" alt="..." >
                     <h5>Mark Attendance</h5>
                     <p>Click here to mark Attendance</p>
                     <button name="submit" class="btn"  style="color: black; background-color: gold;  text-align: center;border-radius:25px;">
                     <a href="finalqrscan.php">Mark attendace</a></button>
                 </div>
            </div>

            <div class="column" style="width: 18rem;">
                 <div class="card" style="padding: 30px; border-radius: 24px;">
                     <img src="45241-class-room (1).gif" alt="..." >
                     <h5>Create Classroom</h5>
                     <p>Click here to create classroom</p>
                     <button name="submit" class="btn"  style="color: black; background-color: gold;  text-align: center;border-radius:25px;">
                     <a href="classroom.php">Classroom</a></button>
                 </div>
            </div>
            
            

            <div class="column" style="width: 18rem;">
                 <div class="card" style="padding: 30px; border-radius: 24px;">
                     <img src="91459-qr-white-scan.gif" alt="...">
                     <h5>Download QR Code</h5>
                     <p>Click here to Download QR Code</p>
                     <button name="submit" class="btn"  style="color: black; background-color: gold;  text-align: center;border-radius:25px;">
                     <a href="QRgenerator.php">Download QR Code</a></button>
                 </div>
            </div>
            
            
        </div>

    </div>

    <!--a href="logout.php">Logout</a-->
    
</body>
</html>
