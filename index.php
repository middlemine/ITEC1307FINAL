<!DOCTYPE html>
<html>
<title>JUST BUY IT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<style>
.mySlides {display:none;}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  float: center;
  
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

}
</style>
<body>

<?php
	include('topmenu.php');
?>

<br><br>

<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="images/android.jpg" style="width:100%">
  <img class="mySlides" src="images/windowsP.png" style="width:100%">
  <img class="mySlides" src="images/iphone4.png" style="width:100%">
</div><br>

<form  action="itemlist.php?category=allitemslist.php" method="post" >
<div class="w3-center">



<h2 class="w3-center">ショッピングモール</h2>
<button class="button"  style="vertical-align:middle"><span>ウェブサイトに入る </span></button></div>



</form>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


<?php
	include('footer.php');
?>

</body>
</html>
