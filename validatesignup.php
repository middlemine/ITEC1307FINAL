<html>
<head>
<title>JUST BUY IT</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script language="JavaScript" type="text/JavaScript" src="checkform.js">

</script>

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
  width: 150px;
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


</head>
<body>

<?php
include('topmenu.php');
?>


<form class="w3-container w3-card-4" action="addcustomer.php" method="post" onsubmit="return validate(this);">

<h2 ><b>Please enter your information</b></h2><br>




<label ><b>Email Address</b></label>
<input class="w3-input w3-border" name="emailaddress" type="text" required></p><span id="emailmsg"> </span>

<label ><b>Password</b></label>
<input class="w3-input w3-border" name="password" type="password" required></p><span id="passwdmsg" ></span>

<label ><b>Password</b></label>
<input class="w3-input w3-border" name="repassword" type="password" required></p><span id="repasswdmsg" ></span>

<label ><b>Complete Name</b></label>
<input class="w3-input w3-border" name="complete_name" type="text"required></p><span id="usrmsg" ></span>

<label ><b>Address</b></label>
<input class="w3-input w3-border" name="address1" type="text" required></p>

<label ><b>Address2</b></label>
<input class="w3-input w3-border" name="address2" type="text" required></p>

<label ><b>City</b></label>
<input class="w3-input w3-border" name="city" type="text" required></p>

<label ><b>State</b></label>
<input class="w3-input w3-border" name="state" type="text" required></p>

<label ><b>Country</b></label>
<input class="w3-input w3-border" name="country" type="text" required></p>

<label ><b>Zip Code</b></label>
<input class="w3-input w3-border" name="zipcode" type="text" required></p>

<label ><b>Phone No</b></label>
<input class="w3-input w3-border" name="phone_no" type="text" required></p>


<button class="button" type="submit" style="vertical-align:middle"><span>Submit </span></button>
<button class="button" type="reset" style="vertical-align:middle"><span>Cancel </span></button>

</table>
</form>



</body>
</html>