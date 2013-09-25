<?php
function BuildPaginationDisplay($basepage, $pagenum, $numpages )
{
  $dirlinks = "<a class=\"pageNavDirLinkCur\" href=\"". $basepage . "?pagenum=" . $pagenum ."\">" . $pagenum . "</a>";

  //-- prev page nav links -----
  for ($i=$pagenum-1,$j=1; $i>=1 && $j < 5; $i--,$j++)
  {
   	 $dirlinks = "<a class=\"pageNavDirLink\" href=\"" . $basepage . "?pagenum=" . $i . "\">" . $i . "</a>" . $dirlinks;
  }
  $dirlinks = "<a class=\"pageNavDirLink\" href=\"" . $basepage . "?pagenum=1\">First</a>" . $dirlinks;

  // -- next page nav links ----
  $lastpagenum=$pagenum;
  for ($i=$pagenum+1,$j=1; $i<=$numpages && $j < 5; $i++, $j++)
  {
  	 $dirlinks .= "<a class=\"pageNavDirLink\" href=\"" . $basepage . "?pagenum=" . $i . "\">" . $i . "</a>";
  	 $lastpagenum++;
  }
  if( $lastpagenum < $numpages )
     $dirlinks .= "<a class=\"pageNavDirLink\">...</a>";
  $dirlinks .= "<a class=\"pageNavDirLink\" href=\"". $basepage . "?pagenum=" . $numpages . "\">Last</a>";

  // -- pagination display
  $pageNavHTML = "<div class=\"pageNav\"><a class=\"pageNavPrev\"";
  if( $pagenum > 1 ) 
    $pageNavHTML .= " href=\"" . $basepage . "?pagenum=" . ($pagenum-1) . "\""; 
  $pageNavHTML .= ">Previous</a>" . $dirlinks . "<a class=\"pageNavNext\"";
  if( $pagenum < $numpages )
    $pageNavHTML .= " href=\"" . $basepage . "?pagenum=" . ($pagenum+1) . "\""; 
  $pageNavHTML .= ">Next</a>" . "</div>";
 return $pageNavHTML; 
}
?>