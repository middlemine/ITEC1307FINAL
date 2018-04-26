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
<?php


include('topmenu.php');

$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cartamount = 0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount'] = $cartamount;
if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
}
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
        (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $sess = session_id();
    $query = "select * from cart where cart_sess = '$sess'";
    $result = mysqli_query($connect, $query) or die(mysql_error());
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="#333" size="4">Welcome <?= $email_address; ?></font><br><br>
                <p>
                    If you have finished Shopping <a href=shipping_info.php>Click Here</a> to supply ShippingInformation<br>
                    Or You can do more purchasing by selecting items from the menu.
                </p>
            </div>
        </div>
    <?php } else { ?>
        <div class="panel panel-success text-center">
            <div class="panel-body">
                <font color="red" size="4">"You can do purchasing by selecting items from the menu on left side</font>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="panel panel-success text-center">
        <div class="panel-body">
            <font color="red" size="4">Not Logged in yet</font>
            <p>
                You are currently not logged into our system.<br>
                You can do purchasing only if you are logged in.<br>
                If you have already registered
            </p>
        </div>
        <div class="panel-footer">
            <a href="signin.php" class="btn btn-success">Login</a>
            <a href="validatesignup.php" class="btn btn-primary">Register</a>
        </div>
    </div>
    <?php
}
include('footer.php');
?>