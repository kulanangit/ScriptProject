<?php session_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
                <center>
                <h4> Log-in </h4>
                </center>
<center>
<body>
      <form name="frmlogin"  method="post" action="check_user.php">
        <table border="0">
            Sign-in
            <br><br>
            <tr>
                 <!-- "padding: [top] [right] [bottom] [left]" -->
              <td style="padding: 0px 0px 0px 15px "> username:</td>
              <td style="padding: 0px 0px 0px 15px "><input type="text" name="username" required></td>
            </tr>
            <tr>
              <td style="padding: 0px 0px 0px 15px"> password:</td>
              <td style="padding: 0px 0px 0px 15px"><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td dir="rtl" style="padding: 15px 0px" ><a href="signup.htm">Sign Up</a></td>
              </tr>
          
       </table>
       <button type="submit">Login</button>
      </form>
</body>
</center>
</html>