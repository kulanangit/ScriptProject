<?php
  //fetch.php
  $connect = mysqli_connect("localhost", "root", "", "helloboard_db");
  $output = '';
  if(isset($_POST["query"])){
      $search = mysqli_real_escape_string($connect, $_POST["query"]);
      $query = "SELECT * FROM webboard WHERE  Category  = 'Health' AND  Question LIKE '%".$search."%' ";
  }
  else{
      $query = "SELECT * FROM webboard WHERE  Category  = 'Health' ORDER BY QuestionID ";
  }
  $result = $connect->query($query);
  if(mysqli_num_rows($result) > 0){
  $output .= '
    <div class="table-responsive">
    <table style="width:100%">
      <tr>
        <th>QuestionID</th>
        <th>Question</th>
        <th>Name</th>
        <th>CreateDate</th>
        <th>View</th>
        <th>Reply</th>
        <th>Topic</th>
        <th>Major</th>
      </tr>
  ';
    while($row = mysqli_fetch_array($result)){
      $output .= '
      <tr>
        <td>'.$row["QuestionID"].'</td>
        <td><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
        <td>'.$row["Name"].'</td>
        <td>'.$row["CreateDate"].'</td>
        <td>'.$row["View"].'</td>
        <td>'.$row["Reply"].'</td>
        <td >'.$row["Category"].'</td>
        <td>'.$row["Major"].'</td>
      </tr>
      ';
    }
    echo $output;
  }
  else{
  echo 'Data Not Found';
  }
  ?>