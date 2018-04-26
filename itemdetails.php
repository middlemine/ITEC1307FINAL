<!DOCTYPE html>
<html lang="en">
<head>
<title>JUST BUY IT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <style>
.zoom {

    transition: transform .2s; /* Animation */
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
  
</head>


<?php
$code = $_REQUEST['itemcode'];
$title = $code;
include('Tmenu.php');

$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");

$query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where item_code like '$code'";
$results = mysqli_query($connect, $query) or die(mysql_error()); // #1
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-lg-4 text-center">
            <div class="zoom">
                <img src='<?php echo $imagename; ?>' style="max-width:350px;max-height:250px;width:auto;height:auto;"></img>
            </div>
        </div>
            <div class="col-lg-8">
                <?php
                $itemname = urlencode($item_name);
                $itemprice = $price;
                $itemdescription = $description;
                $pfquery = "SELECT feature1, feature2, feature3, feature4, feature5,feature6 FROM productfeatures " . "where item_code like '$code'"; // #2
                $pfresults = mysqli_query($connect, $pfquery) or die(mysql_error());
                $pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
                extract($pfrow);
                ?>
                <font size="4">
                <?php
                echo $item_name . '<br><br>';
                echo $feature1 . '<br>';
                echo $feature2 . '<br>';
                echo $feature3 . '<br>';
                echo $feature4 . '<br>';
                echo $feature5 . '<br>';
                echo $feature6 . '<br>';
                ?>
                </font>
            </div>
            <div class="col-lg-12">
                <form method="POST" action="cart.php?action=add&icode=<?php echo $item_code; ?>&iname=<?php echo $itemname; ?>&iprice=<?php echo $itemprice; ?>">
                    <br>Quantity: <input class="" type="number" name="quantity" size="2" value="1">&nbsp;&nbsp;&nbsp;Price: <?php echo $itemprice; ?>
                    <button name="buynow" type="submit" class="button" style="vertical-align:middle"><span>Buy now</span></button>
                    <button name="addtocart" type="submit" class="button" style="vertical-align:middle"><span>Add To Cart</span></button>
                </form>
                <br><br>
                <?php echo $itemdescription; ?>
            </div>
        </div>
    </div>
</div>
