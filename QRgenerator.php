<?php

include 'config.php';

error_reporting(0);

session_start();



if(isset($_POST['addstud'])){
    $username = $_POST['username'];
    $roll_no = $_POST['roll_no'];
    $class = $_POST['class'];
    
    $sql = "SELECT * FROM table2 WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    if(!$result->num_rows > 0){
        $sql = "INSERT INTO table2 (username,  roll_no, class)
                VALUES ('$username', '$roll_no','$class')";
        $result = mysqli_query($conn, $sql);
        if($result){
                echo "<script>alert('Successfully added')</script>";
                $username = "";
                $roll_no = "";
                $class = "";
        }
        else {
            echo "<script>alert('Woops!!! something went wrong!')</script>";
        }
    }
    else{
          echo "<script>alert('Woops!!! user Already Exists!')</script>";
    
    }
   
}

?>

<!DOCTYPE html>
<html>
  
<head>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" >
  
  <style>
    .qr-code {
      max-width: 200px;
      margin: 10px;
    }
  </style>
  
  <title>QR Code Generator</title>
</head>
  
<body>
  <div class="container-fluid">
    <div class="text-center">
  
      <!-- Get a basic image,
       this will change  later -->
      <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive" />
    </div>
  <!-- ----form----- -->
    <div class="form-horizontal" >
      <div class="form-group">
        <label class="control-label col-sm-2"
          for="content">
          Username:
        </label>
        <div class="col-sm-10">
  
          <!-- Input box to enter the 
              required data -->
          <input type="text" size="60" maxlength="60" class="form-control" id="content" placeholder="Enter username" name="username" value="<?php echo $username; ?>" required/>
        </div>


        <!------label class="control-label col-sm-2"
          for="content1">
          email:
        </label>
        <div class="col-sm-10"-->
  
          <!-- Input box to enter the 
              required data -->
          <!----input type="email" size="60" maxlength="60" class="form-control" id="content1" placeholder="email" />
        </div--->

        <label class="control-label col-sm-2"
          for="content2">
          roll no:
        </label>
        <div class="col-sm-10">
  
          <!-- Input box to enter the 
              required data -->
          <input type="number" size="60" maxlength="60" class="form-control" id="content2" placeholder="Enter roll no" name="roll_no" value="<?php echo $roll_no; ?>" required/>
        </div>

        <label class="control-label col-sm-2"
          for="content3">
          class:
        </label>
        <div class="col-sm-10">
  
          <!-- Input box to enter the 
              required data -->
          <input type="text" size="60" maxlength="60" class="form-control" id="content3" placeholder="Enter class" name="class" value="<?php echo $_POST['class']; ?>" required/>
        </div>
        <!---div class="input-group">
          <button name="addstud" class="btn"  style="color: white; background-color: #142850;  align-self: center; border-radius: 25px;  box-shadow: 0 5px #666; transform: translate Y(4px); ">Add Student</button>
        </div-->

      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
  
          <!-- Button to generate QR Code for
           the entered data -->
          <button type="button" class=
            "btn btn-default" id="generate">
            Generate
          </button>
        </div>

        <button onclick="window.print()">Print this page</button>
      </div>
     
      
    </div>
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
         'https://chart.googleapis.com/chart?cht=qr&chl=' +
          htmlEncode($('#content').val()) + htmlEncode($('#content1').val()) +htmlEncode($('#content2').val()) +htmlEncode($('#content3').val()) +
          '&chs=160x160&chld=L|0'
  
        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
      });
    });
  </script>
    
  
    

</body>
  
</html>