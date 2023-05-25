<?php

include 'config.php';

error_reporting(0);

session_start();



if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(!$result->num_rows > 0){
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
                    echo "<script>alert('Wow!! User registeration completed!')</script>";
                    $username = "";
                    $email = "";
                    $roll_no = "";
                    $class = "";
            } else {
                echo "<script>alert('Woops!!! something went wrong!')</script>";
            }
        }
        else{
              echo "<script>alert('Woops!!! Email Already Exists!')</script>";
        
        }
    } else {
        echo "<script>alert('Password not matched')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Detection System</title>
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
<div class="Second" id="Second">
        <h2 class="hsecond"></h2>
        <div class="container">
            
            <form action="" method="POST" class="login-email" style="border-style: solid; border-color: gold; border-radius: 25px; background-color: gold;  width: 500px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; padding: 30px; margin: auto; " >
               <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
               <div class="input-group">
                   <input type="text" placeholder="Username" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="username" value="<?php echo $username; ?>" required>
               </div>
               <br>
               <div class="input-group">
                   <input type="email" placeholder="email" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="email" value="<?php echo $email; ?>" required>
               </div>
               <br>
               <div class="input-group">
                     <input type="password" placeholder="Password" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <br>
                <div class="input-group">
                     <input type="password" placeholder="Confirm Password" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <br>
                <div class="input-group">
                     <button name="submit" class="btn"  style="color: white; background-color: #142850;  align-self: center; border-radius: 25px;  box-shadow: 0 5px #666; transform: translate Y(4px); ">Register</button>
                 </div>
                 <br>
                 <p class="login-register-text">Already have account? 
                 <button name="submit" class="btn"  style="color: white; background-color: #142850;  align-self: center;border-radius: 25px; box-shadow: 0 5px #666; transform: translate Y(4px); ">
                 <a href="homepage1.php" style="color: white; ">Login here</a></button></p>
            </form>
        </div>
    </div>

</body>
</html>