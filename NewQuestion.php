<html>
<head>
  <title>Add new question</title>
  <link rel="stylesheet" type="text/css" href="newquestion.css" > 
</head>
<body>
  <form action="insertQuestion.php" method="post" name="frmMain" id="frmMain">
  <div class="header">
      <h1>SUT Webboard</h1>
      <p>Add new post</p>
  </div>
  <div class="content">
    <table width="700px" align="center">
      <tr>
          <td>
              <p1>Question</p1>
          </td>
          <td>
              <p2><input name="txtQuestion" type="text" id="txtQuestion" value="" size="55" placeholder="Add your question here....."></p2>
          </td>
      </tr>
      
      <tr>
          <td>
              <p1>Details </p1>
          </td>
          <td>
          <div class="col-75">
              <p2><textarea name="txtDetails" cols="50" rows="15" id="txtDetails" placeholder="Type your detail......"></textarea></p2>
          </div>
          </td>
      </tr>
      <tr>
          <td>
            <p1>Name</p1>
          </td>
          <td>  
            <p2><input name="txtName" type="text" id="txtName" value="" size="55" placeholder="Insert your avatar name...."></p2>
          </td>
      </tr>        
    </table>
    <br>
    <div class="input-button" align="center">
            <input name="btnSave" type="submit" id="btnSave" value="Submit">
    <div>
  </form>
</body>
</html>