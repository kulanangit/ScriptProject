<!DOCTYPE html>
<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");

if(isset($_GET["Action"]))
{
  if($_GET["Action"] == "Save")
  {
      //*** Insert Reply ***//
      $strSQL = "INSERT INTO reply (QuestionID,CreateDate,Details,Name) VALUES('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."')";
      $rs = mysqli_query($conn,$strSQL);
      
      //*** Update Reply ***//
      $strSQL = "UPDATE webboard SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
      $rs = mysqli_query($conn,$strSQL);	
  }
}
?>

<html>
<head>
  <title>SUT-Webboard.Com</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body>
<?php
    //*** Select Question ***//
    $strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
    $rs = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
    $objResult = mysqli_fetch_array($rs);

    //*** Update View ***//
    $strSQL = "UPDATE webboard SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
    $objQuery = mysqli_query($conn,$strSQL);	
?>

<center>
<table width="738" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2"><center><h1><?=$objResult["Question"];?></h1></center></td>
  </tr>
  <tr>
    <td height="53" colspan="2"><?=nl2br($objResult["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">Name : <?=$objResult["Name"];?> Create Date : <?=$objResult["CreateDate"];?></td>
    <td width="253">View : <?=$objResult["View"];?> Reply : <?=$objResult["Reply"];?></td>
  </tr>
</table>

<table width="738">
  <tr align= "right">
    <a href="report.php">Report Post</a>
  </tr>
</table>

<br>
<br>

<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysqli_fetch_array($objQuery2))
{
	$intRows++;
?> 
<table width="738" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td height="53" colspan="2">Comment <?=$intRows;?> : <?=nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">Name :
        <?=$objResult2["Name"];?></td>
    <td width="253">Create Date :
    <?=$objResult2["CreateDate"];?></td>
  </tr>
</table><br>
<?php
}
?>
<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
  <table width="738" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="78">Reply</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="78">Name</td>
      <td width="647"><input name="txtName" type="text" id="txtName" value="" size="50"></td>
    </tr>
  </table>
  <br>
  <input name="btnSave" type="submit" id="btnSave" value="Submit">
  <br><br><br><a href="Webboard.php">Back to Webboard</a> <br>
</form>
</body>
<?php mysqli_close($conn);?>

</html>