<?php 
session_start();
?>
<html>
<header>

        <link rel="stylesheet" type="text/css" href="list_user.css">
            <div class="header">
            <h1>User Control</h1>
            <p></p>
        </div>
        
</header>
<body>
    <button onclick="location.href='logout.php'" style="float: right;" >Logout</button>
<form action="delete_user.php" method="GET">
<form action="edit_role.php" method="GET">

<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
   <div class="container" align="center">
      <div class="form-group">
        <div class="input-group">
              <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search username"/>
              <label class="form-label" for="form1"></label>
    </div>
    </div>
    <br>
    <div id="result"></div>
  </div>
  </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"searchname.php",
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
</form>
</form>
</body>
</html>