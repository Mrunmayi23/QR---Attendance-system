<?php

include 'config.php';

error_reporting(0);

session_start();



if(isset($_POST['addstud'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $roll_no = $_POST['roll_no'];
    $class = $_POST['class'];
    
    $sql = "SELECT * FROM `table1` WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    if(!$result->num_rows > 0){
        $sql = "INSERT INTO table1 (username, email, roll_no, class)
                VALUES ('$username', '$email', '$roll_no','$class')";
        $result = mysqli_query($conn, $sql);
        if($result){
                echo "<script>alert('Successfully added')</script>";
                $username = "";
                $email = "";
                $roll_no = "";
                $class = "";
        } else {
            echo "<script>alert('Woops!!! something went wrong!')</script>";
        }
    }
    else{
          echo "<script>alert('Woops!!! user Already Exists!')</script>";
    
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet1" href="style1.css">
    <title>Classroom</title>
    <style>
    .qr-code {
      max-width: 200px;
      margin: 10px;
    }
  </style>

</head>
<body>
    

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
                        <a class="nav-link" href="welcome.php">back</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="container">
       

    <div class="text-center">
  
      <!-- Get a Placeholder image initially,
       this will change according to the
       data entered later -->
      <!--img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0" style="self-align: center;" class="qr-code img-thumbnail img-responsive" /-->
    </div>


            
        <form action="" method="POST" class="addstud" style="border-style: solid; border-color: gold; border-radius: 25px; background-color: gold;  width: 500px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; padding: 30px; margin: auto; " >
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add Student</p>
            
            <label class="control-label col-sm-2" for="content">Username:</label>
            <div class="input-group">
               <input type="text" placeholder="Username" id="content" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="username" value="<?php echo $username; ?>" required>
            </div>
            <br>

            <label class="control-label col-sm-2" for="content1"> email:</label>
            <div class="input-group">
               <input type="email" placeholder="email"  style="border-style: solid; border-color: #142850; border-radius: 25px; " name="email" value="<?php echo $email; ?>" required>
            </div>
            <br>

            <label class="control-label col-sm-2" for="content2">roll no:</label>
            <div class="input-group">
                 <input type="number" placeholder="roll_no"  id="content2" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="roll_no" value="<?php echo $roll_no; ?>" required>
            </div>
            <br>

            <label class="control-label col-sm-2" for="content3">class:</label>
            <div class="input-group">
                 <input type="text" placeholder="class" id="content3" style="border-style: solid; border-color: #142850; border-radius: 25px; " name="class" value="<?php echo $_POST['class']; ?>" required>
            </div>
            <br>
            <div class="input-group">
                 <button name="addstud" class="btn"  style="color: white; background-color: #142850;  align-self: center; border-radius: 25px;  box-shadow: 0 5px #666; transform: translate Y(4px); ">Add Student</button>
             </div>

             <!--div class="input-group">
                 <button name="addstud1" class="btn" id="generate"  style="color: white; background-color: #142850;  align-self: center; border-radius: 25px;  box-shadow: 0 5px #666; transform: translate Y(4px); ">generate QR </button>
             </div-->
  
        </form>
    </div>

    <script src=
    "https://code.jquery.com/jquery-3.5.1.js">
  </script>
  
  <script>
    // Function to HTML encode the text
    // This creates a new hidden element,
    // inserts the given text into it 
    // and outputs it out as HTML
    function htmlEncode(value) {
      return $('<div/>').text(value)
        .html();
    }
  
    $(function () {
  
      // Specify an onclick function
      // for the generate button
      $('#generate').click(function () {
  
        // Generate the link that would be
        // used to generate the QR Code
        // with the given data 
        let finalURL =
         'https://chart.googleapis.com/chart?cht=qr&chl=' + htmlEncode($('#content').val()) + htmlEncode($('#content1').val()) + htmlEncode($('#content2').val()) + htmlEncode($('#content3').val()) + &chs=160x160&chld=L|0'
  
        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
      });
    });
  </script>
    
   



</body>
</html>