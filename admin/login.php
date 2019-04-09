<?php
    //login page ma pani we have to start a sessionm
    session_start();
?>


<html>
    <head>
            <title>Admin login page </title>
            <link rel="stylesheet" type="css/text" href="login.css"/>
    </head>
<!-- this is real one layoyt but we use differnet type login 
<body background="gray">
        <form method="POST" action="login.php">
                <table align="center" width="400" border="10" bgcolor="pink">
                <tr>
                        <td bgcolor="yellow" colspan="4" align="center"><h1>Admin Login Form</h1>
                        </td>
                 </tr>
                <tr>
                        <td align="right">Username:</td>
                        <td><input type="text" name="user_name"></td>
                </tr>
                <tr>
                        <td align="right">Password:</td>
                        <td><input type="password" name="user_pass"></ins></td>
                </tr>
                <tr>
                        <td align="center" colspan="4"><input type="submit" name="login" value="LOGIN"></td>
                </tr>
         </table>
        </form>


-->
<form method="POST" action="login.php">
  <fieldset class="account-info">
    <label>
      Username
      <input type="text" name="user_name">
    </label>
    <label>
      Password
      <input type="password" name="user_pass">
    </label>
  </fieldset>
  <fieldset class="account-action">
    <input class="btn" type="submit" name="login" value="Login">
    
  </fieldset>
</form>
</body>

</body>
</html>

<?php
        include("includes/connect.php");

        if (isset($_POST['login'])) {
        $user_name=$_POST['user_name'];
        $user_pass=$_POST['user_pass'];

        $admin_query="SELECT * FROM admin_login WHERE user_name='$user_name' AND user_pass='$user_pass' ";

            $run=mysql_query($admin_query);
            if (mysql_num_rows($run)>0) {
                $_SESSION['user_name']=$user_name;
                //redirect the person to admin pannel
             echo "<script>window.open('index.php','_self')</script>";
            }else{
                echo "<script>alert ('invalid username or password')</script>";
            }
        }

?>

