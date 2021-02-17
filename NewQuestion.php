<html>
<head>
  <title>ThaiCreate.Com</title>
  <link rel="stylesheet" type="text/css" href="NewQuestion.css"> 
</head>
<body>
  <form action="insertQuestion.php" method="post" name="frmMain" id="frmMain">
    
  <h3>Add new post</h3>
  <div >
        <div class="form-group">
              <p1>Question</p1>
              <p2><input name="txtQuestion" type="text" id="txtQuestion" value="" size="55"></p2>
        </div>
        <br/>
        <div class="form-group">
          <p1 >Details  </p1>
          <p2><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></p2>
        </div>
        <br/>
        <div class="form-group">
          <p1 >Name</p1>
          <p2 ><input name="txtName" type="text" id="txtName" value="" size="55"></p2>
        </div>
    <br><input name="btnSave" type="submit" id="btnSave" value="Submit">
  </form>
</body>
</html>