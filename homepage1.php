<?php

include 'config.php';

session_start();

error_reporting(0);




if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users  WHERE email ='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    } else{
        echo "<script>alert('Woops!!! Email or password is wrong!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto:wght@300&family=Sansita&family=Vollkorn:ital@1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

</head>
<body>

<!-- ..............................................................................   -->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: gold;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AttendanceKit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#First">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Second">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Third">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Fourth">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Fifth">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="First" id="First">
        <h1>Welcome to XYZ College!</h1>
        <br>
        <h1 style="text-align: center;">Attendance Tracker System</h1>
        <br>
        
        <br>
        <br>
        <br>
        <img src="demo.gif" class="homeimg" alt="..." width="300px " >
    </div>



<!-- ....................................................... -->


<div class="Second" id="Second">
        <h2 class="hsecond"></h2>
        <div class="container">
        <br>
        <br>
        <br>
            
            <form action="" method="POST" class="login-email" style="border-style: solid; border-color: gold; border-radius: 25px; background-color: gold;  width: 500px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; margin: auto;" >
               <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
               <div class="input-group"  >
                   <input type="email" placeholder="email" style="border-style: solid; border-color: #142850; border-radius: 25px; background-color: gold;" name="email" value="<?php echo $email; ?>" required>
               </div>
               <br>
               <div class="input-group" >
                     <input type="password" placeholder="Password" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="password" value="<?php echo $_POST['password']; ?>"  required>
                </div>
                <br>
                <div class="input-group">
                     <button name="submit" class="btn"  style="color: white; background-color: #142850;  align-self: center; border-radius: 24px;  box-shadow: 0 5px #666; transform: translate Y(4px);">login</button>
                 </div>
                 
                 <p class="login-register-text">Don't Have An Account? 
                 <button name="submit" class="btn"  style="color: black; background-color: #142850;  text-align: center;border-radius:24px;  box-shadow: 0 5px #666; transform: translate Y(4px);">
                 <a href="register.php" style="color: white;"> Register here </a></button></p>

            </form>
        </div>
        <br>
        <br>
        <br>
        <br>

    </div>

    <!-- ........................................................................... -->


    <div class="Third" id="Third">
        <h2 class="hsecond">Mark Attendance Through QR code</h2>
        <!---h5 class="hsecond" id="hsecond">Check your email for your QR code.</h5--->
        <img src="91459-qr-white-scan.gif" alt="" width="300px">
    </div>

    <!-----div class="Fourth" id="Fourth">
        <h2 class="hthird">About</h2>
    </div>

    <div class="Fifth" id="Fifth">
        <h3>Help</h3>
    </div---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>