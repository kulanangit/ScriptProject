<html>
<head>
  <title>ThaiCreate.Com</title>
  <link rel="stylesheet" type="text/css" href="NewQuestion.css" > 
</head>
<body>
  <form action="insertQuestion.php" method="post" name="frmMain" id="frmMain">
    
  <h3 class="addnew" >Add new post</h3>
  <div >
    <table align="center" >
      <tr>
          <td>
              <p1>Question</p1>
          </td>
          <td>
              <p2><input name="txtQuestion" type="text" id="txtQuestion" value="" size="55"></p2>
          </td>
      </tr>
      
      <tr>
          <td>
              <p1 >Details  </p1>
          </td>
          <td>
              <p2><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></p2>
          </td>
      </tr>
      <tr>
          <td>
            <p1 >Name</p1>
          </td>
          <td>  
            <p2 ><input name="txtName" type="text" id="txtName" value="" size="55"></p2>
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