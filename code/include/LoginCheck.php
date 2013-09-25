<?php

// check if logged in 
   if(!isset($_SESSION['urights']))
   {  // not logged in 
      header('Location: /mothersmilk/login.php'); 
      exit();  
   }
   // check if timeout
   if(isSet($_SESSION['starttime']))
   {
     if((mktime() - $_SESSION['starttime'] - 60*30) > 0)
     {
       header('Location: /mothersmilk/logout.php');
       exit();  
     }
     else
      $_SESSION['starttime'] = mktime();
   }
   else
   {
      $_SESSION['starttime'] = mktime();
   }
?>
