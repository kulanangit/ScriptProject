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
  <?php 
session_start();
        error_reporting(0);
        ini_set('display_errors', 0); //hide error
        $conn=mysqli_connect("localhost", "root", "","helloboard_db");
        $conn->query("SET NAMES UTF8");
        $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $strSQL);
        if($_SESSION['username'] == "")
        {
          echo "<center><h2><b>Please Login!</b></h2>
          <a href='login.htm'><h1><b>Login</b></h1></a><center>";
        }
?>

  <div class="content">
    <table width="1000px" align="center">
      <tr>
          <td>
              <p1>Question</p1>
          </td>
          <td>
              <p2><input name="txtQuestion" type="text" id="txtQuestion" value="" size="55" placeholder="Add your question here....." <?php if($_SESSION['username'] == "")  {echo "disabled=\"disabled\"";} ?>></p2>
          </td>
      </tr>
      
      <tr>
          <td>
              <p1>Details </p1>
          </td>
          <td>
          <div class="col-75">
              <p2><textarea name="txtDetails" cols="50" rows="15" id="txtDetails" placeholder="Type your detail......" <?php if($_SESSION['username'] == "")  {echo "disabled=\"disabled\"";} ?>></textarea></p2>
          </div>
          </td>
      </tr>
      <tr>
          <td>
            <p1>Name</p1>
          </td>
          <td>  
            <p2><input name="txtName" type="text" id="txtName" value="<?php echo $_SESSION['username'] ?>" size="55" placeholder="Insert your avatar name...." disabled></p2>
          </td>
      </tr> 
      <tr>
          <td> Topic</td>
          <td>
          <div class="box">
            <select name="topic">
              <option disabled selected>Choose Topic...</option>
              <option value="Love">Love</option>
              <option value="Education">Education</option>
              <option value="Drama">Drama</option>
              <option value="Health">Health</option>
              <option value="Game">Game</option>
              <option value="Idol">Idol</option>
            </select>
          </div>
          </td>
      </tr>
      <tr>
          <td> Major</td>
          <td>
          <div class="box">
            <select name="major">
              <option disabled selected>Choose Major...</option>
              <option value="Science">Science</option>
              <option value="Social Technology">Social Technology</option>
              <option value="Agriculture">Agriculture</option>
              <option value="Medicine">Medicine</option>
              <option value="Nurse">Nurse</option>
              <option value="Engineer">Engineer</option>
              <option value="Dentisty">Dentisty</option>
              <option value="Public Health">Public Health</option>
            </select>
            </div>
          </td>
      </tr>       
    </table>
    <br>
    <br>
     <br>
    <div class="input-button" align="center">
            <input name="btnSave" type="submit" id="btnSave" value="Submit" <?php if($_SESSION['username'] == "")  {echo "disabled=\"disabled\"";} ?>>
    <div>
  </form>
</body>
</html>