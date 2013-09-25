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
 // if( s.selectedIndex == 5|| s.selectedIndex ==2||s.selectedIndex ==3||s.selectedIndex ==4)
  if( s.selectedIndex == 4|| s.selectedIndex ==1||s.selectedIndex ==2||s.selectedIndex ==3)
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

function validate(){
  var fname = document.forms[0].donorfname.value;
  var lname = document.forms[0].donorlname.value;
  
  if(fname == " " || lname == " ")
  {
    if(fname == " ")
    {
      document.getElementById("donorfname").focus();
      document.getElementById("donorfname").select();
      alert("There is white space in first name");
      return false;
    }
    else
    {
      document.getElementById("donorfname").focus();
      document.getElementById("donorfname").select();
      alert("White space is not accepted");
      return false;
    }

  }
  else if(fname == "" && lname == "")
  {
    document.getElementById("donorfname").focus();
    document.getElementById("donorfname").select();
    alert("First and last name is empty");
    return false;
  }
  else if(fname == "" && lname != "")
  {
    document.getElementById("donorfname").focus();
    document.getElementById("donorfname").select();
    alert("first name is empty");
    return false;
  }
  else if(fname != "" && lname == "")
  {
    document.getElementById("donorfname").focus();
    document.getElementById("donorlname").select();
    alert("last name is empty");
    return false;
  }
  else
  {
    return true;
  }
}

function donorEditCheck(){
  var email = document.getElementById("email").checked;
  var mail = document.getElementById("mail").checked;
  var fax = document.getElementById("fax").checked;

  var currentDate = document.forms[0].datesentpacket.value;
  var staffInit = document.forms[0].staffinitdatesentpacket.value;

  var recievedDate = document.forms[0].datereceivedpacket.value;
  var recievedInit = document.forms[0].staffinitdatereceivedpacket.value;

  if(email == true || mail == true || fax == true){
    if(currentDate == "" && staffInit != "")
    {
      document.getElementById("datesentpacket").focus();
      document.getElementById("datesentpacket").select();
      alert("Please enter the date");
      return false;
    }
    else if(currentDate != "" && staffInit == "")
    {
      document.getElementById("staffinitdatesentpacket").focus();
      document.getElementById("staffinitdatesentpacket").select();
      alert("Please enter your initials");
      return false;
    }
    else if(currentDate == "" && staffInit == "")
    {
      document.getElementById("staffinitdatesentpacket").focus();
      document.getElementById("staffinitdatesentpacket").select();
      document.getElementById("datesentpacket").select();
      alert("Please enter date and initials");
      return false;
    }
    else if(currentDate == "")
    {
      document.getElementById("datesentpacket").focus();
      document.getElementById("datesentpacket").select();
      alert("Please enter date of package sent");
      return false;
    }
    else if(staffInit == "")
    {
      document.getElementById("staffinitdatesentpacket").focus();
      document.getElementById("staffinitdatesentpacket").select();
      alert("Please enter your initials");
      return false;
    }
    else if(recievedDate != "" && recievedInit == "")
    {
      document.getElementById("staffinitdatereceivedpacket").focus();
      document.getElementById("staffinitdatereceivedpacket").select();
      alert("Please inital your name");
      return false;
    }
    else
    {
     return true;
    }
  }
  document.getElementById("mail").focus();
  alert("checkbox not checked");
  return false;
}






</script>