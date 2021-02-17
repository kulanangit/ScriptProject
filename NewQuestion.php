<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<form action="insertQuestion.php" method="post" name="frmMain" id="frmMain">
  <h3>Add new post</h3>
  <table width="621" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td>Question</td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="70"></td>
    </tr>
    <tr>
      <td width="78">Details</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="78">Name</td>
      <td width="647"><input name="txtName" type="text" id="txtName" value="" size="50"></td>
    </tr>
  </table>
  <br><input name="btnSave" type="submit" id="btnSave" value="Submit">
</form>
</body>
</html>