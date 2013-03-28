



<script>
  
    function showme(es,ei,other)
      {  
        var s = document.getElementById(es);
        var h = document.getElementById(ei);

            if( s.selectedIndex == other ) 
               {
		  h.style.display = "inline";
                  h.style.visibility="visible";  
               }
            else
               {  
		  h.style.display = "none";
                  h.style.visibility="hidden";  
               }  
      }

    function showme2(es,ei)
      {  
        var s = document.getElementById(es);
        var h = document.getElementById(ei);
        var flag = document.getElementById("process");
            if( s.selectedIndex == 1|| s.selectedIndex ==2||s.selectedIndex ==3||s.selectedIndex ==4) 
               {
		              h.style.display = "inline";
                  h.style.visibility="visible";

                  if(s.selectedIndex ==3||s.selectedIndex ==4)
                  {

                    
                        flag.value = "on";
                       alert(flag.value);
                  }
                  else{

                    flag.value = "";
                    alert(flag.value);
                  }
                  
               }
            else
               {

		              h.style.display = "none";
                  h.style.visibility="hidden";  
               }  
      } 

	function showme3(es,ei, flag)
      {  
        var s = document.getElementById(es);
        var h = document.getElementById(ei);
            if( s.selectedIndex == 1|| s.selectedIndex ==2||s.selectedIndex ==3||s.selectedIndex ==4) 
               {
		  h.style.display = "inline";
                  h.style.visibility="visible"; 
			if(s.selectedIndex==3||s.selectedIndex==4)
			{
				flag = "Y"			
			}
               }
            else
               {  
		  h.style.display = "none";
                  h.style.visibility="hidden";
		  flag = "N";  
               }  
      } 
	       
	function getSelected(opt) {
            var selected = new Array();
            var index = 0;
            for (var intLoop = 0; intLoop < opt.length; intLoop++) {
               if ((opt[intLoop].selected) ||
                   (opt[intLoop].checked)) {
                  index = selected.length;
                  selected[index] = new Object;
                  selected[index].value = opt[intLoop].value;
                  selected[index].index = intLoop;
               }
            }
            return selected;
         }

         function outputSelected(opt) {
            var sel = getSelected(opt);
            var strSel = "";
            for (var item in sel){       
               strSel += sel[item].value + "\r";
		}
	    alert("Selected Items:\r" + strSel);
         }
	




</script>

