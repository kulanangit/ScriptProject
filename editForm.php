<html>
<?php
session_start();
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");

error_reporting(0);
ini_set('display_errors', 0); //hide error

        if($_SESSION['username'] == ""){
            echo "<center>Please Login!<center>";
        } 
        else{
            $sql="SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
        }
$rs=$conn->query($sql);
while($row = $rs->fetch_assoc()) { ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <header>
        
            <center>
            <h3> header </h3>
            </center>
    </header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        var newPhoto = "";
        var btn = document.getElementById('submit');
        var btn2 = document.getElementById('clear');
        btn.addEventListener('click', func);
        btn2.addEventListener('click', clear);
        
     function selectPhoto (img){
          if(img == 1){
            newPhoto = "img1";
          }else if(img == 2){
              newPhoto = "img2";
          }else if(img == 3){
              newPhoto = "img3";
          }else{
              newPhoto = "img4";
          }
          
          str = "<img src= './images/" + newPhoto + ".png' width='100' />";
        document.getElementById("pic2").innerHTML = str;
        str2 = "./images/" + newPhoto + ".png";
        document.getElementById('hid').value = str2;
        //document.getElementById('nameimg').value = newPhoto + ".jpg";
        
     };
     
        function func() {
        
        document.getElementById('theForm2').submit('hid');
    };
        /*  window.onload = function() {
            str2 = "./avatar/" + newPhoto + ".jpg"; 
            localStorage.setItem("storageName",str2);
        };
        */

    </script>
    <br>
    <h4 style="padding: 0px 0px 0px 200px "> Sign Up</h4>
    <form action="edit.php" id="theForm2" method="post" onsubmit="return checkPassword();">
    <body>
        <table border="0">
            <tr>
                <td><p id ="pic2" style="padding: 0px 0px 0px 450px "><img src="<?php echo $row['image']; ?>" width="100" onclick="selectPhoto(0)"></p>
        <input type= "hidden" id="hid" name="avatar" value = "./images/img1.png" ></td>
        <td><p style="padding: 0px 0px 0px 280px "> select your avatar</p></td>
            </tr>
        </table>
    <br>
        <table border="0"  dir="ltl" style="float: left; padding: 0px 25px 0px 200px">
            
            <tr>

                 <!-- "padding: [top] [right] [bottom] [left]" -->

              <td style="padding: 15px 0px 0px 15px "> username:</td>
              <td style="padding: 15px 0px 0px 15px "><input type="text" value ="<?php echo $row['username']; ?>" id="username" name="username" placeholder="Username" pattern="^[a-z0-9_-]{5,15}$" required onBlur="checkAvailability()"><span id="user-availability-status" style="padding: 20px "><img src=''></span></td>
              
            </tr> 
            <tr>
                <td style="padding: 15px 0px 0px 15px "> major:</td>
                <td style="padding: 15px 0px 0px 15px ">
                <input name="major" id="major" value ="<?php echo $row['major'] ?>" disabled>
                </td>
              </tr>
            <tr>
             <td style="padding: 15px 0px 0px 15px "> new password:</td>
             <td style="padding: 15px 0px 0px 15px "><input type="password" name="password" placeholder="Password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td>
            </tr>
             <tr><td style="padding: 15px 0px 0px 15px"> new confirm password:</td>
             <td style="padding: 15px 0px 0px 15px"><input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td>
             <tr>
                <tr>
                <td colspan = "2" style="padding: 15px 0px 0px 15px">
                    <br>Username accepts 6 to 20 characters with any lower case character, 
                    <br>digit or special symbol "_" or "-" only.<br>
                    <br>Password must contain at least one number and one uppercase and lowercase letter, 
                    <br>and at least 8 up to 30 characters.</td>
            </tr>
                <td colspan = "2"><p style="padding: 25px 0px 0px 250px">
                <input type="submit" value="Save">
                <button onclick="location.href='Webboard.php'">Cancel</button>
            </tr>
    
           
        </table>
          
        <table style="float: left;" border="0">
            <tr>     
                <td style="padding: 0px 10px 10px 0px "><img id=1 src="./images/img1.png" width="100" onclick="selectPhoto(1)"></td>
                <td style="padding: 0px 10px 10px 0px "><img id=2 src="./images/img2.png" width="100" onclick="selectPhoto(2)"></td>
            </tr>
            <tr>
                <td><img id=3 src="./images/img3.png" width="100" onclick="selectPhoto(3)"></td>
                <td><img id=4 src="./images/img4.png" width="100" onclick="selectPhoto(4)"></td>
            </tr>
    

        </table>
        <?php } $conn->close(); ?>
    </body>
    </form>
    <script>
        function checkPassword(){
          var1 = document.getElementById("password");
          var2 = document.getElementById("confirm_password");
          if(var1.value != var2.value){
              var2.setCustomValidity("Passwords Don't Match");
              //alert("Passwords do not match, please try again!");
              return false;   
              }
              else{
                  return true;
              }
          }
         </script>
         <script type="text/javascript">
            function checkAvailability(){
            $("#loaderIcon").show();
            
            $.ajax({
                type:"POST",
                url:"check_username.php",
                cache:false,
                data:{
                    type:1,
                    username:$("#username").val(),
                },
                success:function(data){
                    $("#user-availability-status").html(data);
                    //$('#submit').prop('disabled', true);
                }
            });
            }
            </script>
   
        <center>
            <footer> Footer </footer>
        </center>
</center>
</html>