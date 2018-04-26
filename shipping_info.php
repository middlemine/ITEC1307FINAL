<!doctype html>
<html>
<head>

<title>JUST BUY IT</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>


<style>
    .AAA
    {
        

    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
   
    }

    
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
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>


<?php
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");
$email_address="";
if (isset($_SESSION['emailaddress']))
{
$email_address=$_SESSION['emailaddress'];
}
if (isset($_SESSION['password']))
{
$password=$_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
(isset($_SESSION['password']) && $_SESSION['password'] != "")) {
$query = "SELECT * FROM customers where email_address like '$email_address'
and password like (PASSWORD('$password'))";
$results = mysqli_query($connect, $query) or die(mysql_error());
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
?>
<form action="2checkout.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">
<tr><td colspan="2" align="center"><b>Your information available with us:</b></td></tr>


<tr><td>Email Address:</td><td><input size="20" type="text" class="AAA"
name="email_address" value="<?php echo $email_address; ?>"></td></tr>

<tr><td>Complete Name: </td><td><input size="50" type="text" class="AAA"
name="complete_name" value="<?php echo $complete_name; ?>"></td></tr>

<tr><td>Address: </td><td><input size="80" type="text" class="AAA" name="address1"
value="<?php echo $address_line1; ?>"></td></tr>

<tr><td></td><td><input size="80" type="text" class="AAA" name="address2" value="<?php
echo $address_line2; ?>"></td></tr>
 
<tr><td>City: </td><td><input size="30" type="text" class="AAA" name="city"
value="<?php echo $city; ?>"></td></tr>

<tr><td>State: </td><td><input size="30" type="text" class="AAA" name="state"
value="<?php echo $state; ?>"></td></tr>

<tr><td>Country: </td><td><input size="30"  type="text" class="AAA" name="country"
value="<?php echo $country; ?>"></td></tr>

<tr><td>Zip Code: </td><td><input size="20" type="text" class="AAA" name="zipcode"
value="<?php echo $zipcode; ?>"></td></tr>

<tr><td>Phone No: </td><td><input size="30" type="text" class="AAA" name="phone_no"
value="<?php echo $cellphone_no; ?>"></td></tr>

<tr><td colspan=2 align="center"><b>Please update shipping information if different from the shown below: </b></td></tr>

<tr><td> Address to deliver at: </td><td><input type="text" class="AAA" size="80"
name="shipping_address_line1" value="<?php echo $address_line1; ?>"></td></tr>

<tr><td></td><td><input type="text"  class="AAA" size="80" name="shipping_address_line2"
value="<?php echo $address_line2; ?>"></td></tr>

<tr><td> City: </td><td><input size="30" type="text" class="AAA"
name="shipping_city" value="<?php echo $city; ?>"></td></tr>

<tr><td> State: </td><td><input size="30" type="text" class="AAA"
name="shipping_state" value="<?php echo $state; ?>"></td></tr>

<tr><td> Country: </td><td><input size="30" type="text" class="AAA"
name="shipping_country" value="<?php echo $country; ?>"></td></tr>

<tr><td> Zip Code: </td><td><input type="text" class="AAA" size="20"
name="shipping_zipcode" value="<?php echo $zipcode; ?>"></td></tr>

<button class="button" type="submit" style="vertical-align:middle;"><span>Supply Information </span></button>

<button class="button" type="reset" style="vertical-align:middle;"><span>Reset </span></button>





</table>
</form>
<?php
}
?>



</body>
</html>