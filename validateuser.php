<!DOCTYPE html>
<html lang="en">
<head>
  <title>JUST BUY IT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 12px;
  width: 210px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
 
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
  color: white;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
  color: white;
}

</style>





<script language="JavaScript" type="text/JavaScript">
    function updateUser(username){
    var ajaxUser = document.getElementById("userinfo");
    ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;
    <a href="logout.php\">Log Out</a>";
    }
</script>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$query = "SELECT email_address, password, complete_name FROM customers WHERE
email_address like '" . $_POST['emailaddress'] . "' " .
        "AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($connect, $query) or die(mysql_error()); // #3
if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        $_SESSION['emailaddress'] = $_POST['emailaddress'];
        $_SESSION['password'] = $_POST['password'];
        ?>

        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="green" size="4">Welcome <?= $complete_name; ?> to our Shopping Mall</font>
            </div>
            <div class="panel-footer">
                
            <form  action="index.php" method="post" >
            <button class="button"  style="vertical-align:middle"><span>Back to menu </span></button></div>
            </form>
            
            </div>
        </div>
        <script language="JavaScript">updateUser('<?= $complete_name; ?>');</script>
        <?php
    }
} else { ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
            
                <font color="#333" size="4">The username and password you entered did not match our records.<br> Please double-check and try again.</font><br><br><br>

                <form  action="validatesignup.php" method="post" >
                <button class="button"  style="vertical-align:middle;"><span>Register </a></span></button></form>

                <form  action="signin.php" method="post" >
                <button class="button" style="vertical-align:middle;"><span>Let's me try again.</span></button></form>


            </div>
        </div>
    <?php
}
include('footer.php');
?>