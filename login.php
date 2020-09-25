<?php
   include("config.php");
   include("function.php");
   $error="";
if(isset($_POST['submit']))
{
   
    $userName=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    if(email_exists($userName,$con))
    {
        $result = mysqli_query($con, "SELECT password FROM lover WHERE userName='$userName'");
        $retrievepassword = mysqli_fetch_assoc($result);

        if($password !== $retrievepassword['password'])
        {
            $error="Password is incorrect";
        }
        else
        {
            $error="You have login succesfully";
            header("Location:https://harshitkansal16.github.io/Tree-Lovers/");
        }
    }
    else
    {
        $error="Email does not exist or You had signed up more than 1 time";
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
  <link rel="stylesheet" href="login.css">
</head>

<body>
<div class="container">
<img src="4.jpeg" style="margin-top:30px;" class="mx-auto d-block logo" width="200vh" height="200vh"></div>
<div id="error"><?php echo $error; ?> </div>
<div id="wrapper">

<div id="formDiv">
<form method="POST" style="margin-top:30px;">

<label>User Name</label><br>
<input type="text" name="email" placeholder="user name"><br><br>
<label>password</label><br>
<input type="password" name="password" placeholder="password"><br><br>

<label class="keep"><input type="checkbox" name="keep">keep me logged in</label><br><br>
<input type="submit" name="submit" class="btn">
</form>
</div>
</div>
</body>
</html>
