<html>
<head>
<title>ThaiCreate.Com</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" type="text/css" href="Navbar_cat.css"> 
<link rel="stylesheet" type="text/css" href="Webboard.css">
<link rel="stylesheet" type="text/css" href="Topic.css">

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchSocial.php",
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
<body>
<body>
<div class="container">
<div class="navbar">
    <a href="Webboard.php">Public</a>
    <div class="subnav">
        <button class="subnavbtn">Major<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="Webboard_Social.php">Social Technology</a>
          <a href="Webboard_Science.php">Science</a>
          <a href="Webboard_Agricultural.php">Agricutural</a>
          <a href="Webboard_Engineer.php">Engineering</a>
          <a href="Webboard_Medicine.php">Medicine</a>
          <a href="Webboard_Dentistry.php">Dentistry</a>
          <a href="Webboard_Nurse.php">Nurse</a>
        </div>
      </div> 
    <a href="logout.php"> Logout</a>
    </div>
  </div>
  <table align="center">
<tr>
  <div class="header">
    <h1>School of Social Technology</h1>
  </div>
  </tr>
<tr >
    <ul>
      <li><a href="Webboard_Social.php">ALL</a></li>
      <li><a href="Webboard_topic_Soc.php?Topic=Love">Love</a></li>
      <li><a href="Webboard_topic_Soc.php?Topic=Education">Educations</a> </li>
      <li><a href="Webboard_topic_Soc.php?Topic=Drama">Drama</a></li>
      <li><a href="Webboard_topic_Soc.php?Topic=Health">Health</a> </li>
      <li><a href="Webboard_topic_Soc.php?Topic=Game">Game</a></li>
      <li><a href="Webboard_topic_Soc.php?Topic=idol">Idol</a> </li>
  </ul>
</tr>
<tr>
<td>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
   <div class="container">
      <div class="form-group">
        <div class="input-group">
              <a class="button" href="NewQuestion.php">New Topic</a><br>
              <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
              <label class="form-label" for="form1"></label>
    </div>
  </div>
   <div id="result"></div>
  </div>
  </div>
</form>
</td>
</tr>
</body>
</html>