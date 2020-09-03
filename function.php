<?php

  function email_exists($userName, $con)
  {
      $result = mysqli_query($con,"SELECT id FROM lover WHERE userName='$userName'");
       if(mysqli_num_rows($result) == 1)
       {
           return true;
       }
       else
       {
           return false;
       }
  }
?>