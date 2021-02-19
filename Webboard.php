<html>
<head>
<title>ThaiCreate.Com</title>



<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" type="text/css" href="Navbar_cat.css"> 
<link rel="stylesheet" type="text/css" href="Webboard.css">


<script>
  
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</head>
<div class="navbar">
    <a href="Webboard.php">Public</a>
    <div class="subnav">
      <button class="subnavbtn">Major<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="#company">Social Technology</a>
        <a href="#team">Scienc</a>
        <a href="#careers">Agricutural</a>
        <a href="Webboard_Engineer.php">Engineering</a>
        <a href="Webboard_Medicine.php">Medicine</a>
      </div>
    </div> 
    <div class="subnav">
      <button class="subnavbtn">Services <i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="#bring">Bring</a>
        <a href="#deliver">Deliver</a>
        <a href="#package">Package</a>
        <a href="#express">Express</a>
      </div>
    </div> 
    <div class="subnav">
      <button class="subnavbtn">Partners <i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="#link1">Link 1</a>
        <a href="#link2">Link 2</a>
        <a href="#link3">Link 3</a>
        <a href="#link4">Link 4</a>
      </div>
    </div>
    <a href="logout.php" div="ltl">Logout</a>
  </div>


<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<div class="container">
   <br />
   <h2 class="header">SUT webboard</h2><br />
   
  <div class="form-group">
    <div class="input-group">
          <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
          <label class="form-label" for="form1"></label>
    </div>
  </div>
  <a class="button" href="NewQuestion.php">New Topic</a><br>
  <br />
   <div id="result"></div>
  </div>
</form>
</td>
</tr>

</table>
</body>
</html>



