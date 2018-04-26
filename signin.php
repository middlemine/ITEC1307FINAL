<!doctype html>
<html>
<head>

<title>JUST BUY IT</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<?php
include('topmenu.php');
?>

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

<html>
<head>
</head>
<body>

<form class="w3-container w3-card-4" action="validateuser.php" method="post">

<h2 >Sign in</h2>

<label ><b>Email Address</b></label>
<input class="AAA" name="emailaddress" type="text" required><br>

<label ><b>Password</b></label>
<input class="AAA" name="password" type="password" required>


<br>
<button class="button" style="vertical-align:middle;"><span>Sign in </span></button>




</form>


<?php
	include('footer.php');
?>


</body>
</html>