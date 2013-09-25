<?php
session_start();
$username = "";
if( isset($_SESSION['loginusername']) )
{
   // cookie crumbs
  $parts = explode("/", $_SERVER['REQUEST_URI']);
  echo '<div class="crumbpath">' . '<a class="crumb" href="/mothersmilk/">Home</a>';

  $url="/mothersmilk/";
  foreach ($parts as $key ) 
  {  
    if( $key == "mothersmilk" || $key == "")
      continue;
    echo "&nbsp;>>&nbsp;";

    $pos = strpos($key, ".php");
    if( $pos === false )
    {
      $url = $url . $key . "/";
      //$label = ucwords($key);
      switch($key)
      {
        case "recv": $label = "Receiver Menu"; break;
        case "donor": $label = "Screener Menu"; break;
        case "admin": $label = "Administration Menu"; break;
        case "lab": $label = "Lab Menu"; break;
        default: $label = ucwords($key);
      }
    }
    else
      $label="";

    echo '<a href="' . $url . '">' . $label . '</a>'; 
  }
  echo '</div>';

  // -- logged in user and logout button
   echo "<label>Welcome " . $_SESSION['loginusername'] . "</label><span class='logoutbutton'><a href='/mothersmilk/logout.php'>Log out</a></span>";
}
?>
