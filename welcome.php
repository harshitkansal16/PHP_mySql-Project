<?php
    include("config.php");
    $error="";
    if(isset($_POST['submit']))
    {
        $firstName=mysqli_real_escape_string($con,$_POST['fname']);
        $lastName=mysqli_real_escape_string($con,$_POST['lname']); 
        $userName=mysqli_real_escape_string($con,$_POST['email']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $confirmPassword=mysqli_real_escape_string($con,$_POST['cpassword']);
   
        if(strlen($firstName)<3 )
        {
            $error="First Name is too short";
        }
        else if(strlen($lastName)<3)
        {
            $error="Last Name is too short";
        }
        else if(!filter_var($userName, FILTER_VALIDATE_EMAIL))
        {
            $error="Please enter valid email address";
        }
        else if(strlen($password)<6)
        {
            $error="password must be greater than 6 characters ";
        }
        else if(strlen($password)>16)
        {
            $error="password must be shorter than 16 characters";
         }
        else if($password!==$confirmPassword)
        {
            $error="Password does not match";
        }
        else
        {
            $insertQuery="INSERT INTO lover(firstName, lastName, userName, password) VALUES ('$firstName','$lastName','$userName','$password')";
            if(mysqli_query($con, $insertQuery))
            {
                 $error="registered";
                 header("Location:https://harshitkansal16.github.io/Tree-Lovers/");
            }
            else
            {
                 $eror="not";
            }
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tree lovers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:green; text-align:center;">
<div class="container">
            <img src="4.jpeg" class="mx-auto d-block" width="200vh" height="200vh"></div>
            <h1>Sign Up</h1>
<div id="error"><?php echo $error; ?> </div>
<div id="wrapper">
<div id="formDiv">
   
<form method="POST">
<label>First Name</label><br>
<input type="text" name="fname"><br><br>
<label>Last Name</label><br>
<input type="text" name="lname"><br><br> 
<label>User Name</label><br>
<input type="text" name="email"><br><br>
<label>Password</label><br>
<input type="password" name="password"><br><br>
<label>Confirm Password</label><br>
<input type="password" name="cpassword"><br><br><br> 

<input type="submit" name="submit">
</form>
<h2 style="text-align:center;">If u Have already a Account then <a href="login.php">Log in</a></h2>
</body>
</html>