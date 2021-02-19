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
   url:"fetchMedicine.php",
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
</div>
    </div> 

    <a href="logout.php"> Login</a>
  </div>
  </div>

  <div class="header">
      <h1>Scool of Medicine</h1>
      <p>Add new post</p>
  </div>


      
    <ul>
    <li><a href="Webboard_Medicine.php">ALL</a></li>
    <li><a href="Webboard_topic_Med.php?Topic=Love">Love</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=Education">Educations</a> </li>
  <li><a href="Webboard_topic_Med.php?Topic=Drama">Drama</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=Health">Health</a> </li>
  <li><a href="Webboard_topic_Med.php?Topic=Game">Game</a></li>
  <li> <a href="Webboard_topic_Med.php?Topic=idol">idol</a> </li>
</ul>

<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<div class="container">
   <br />

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



</body>
</html>