<?php


require_once("lib/Twocheckout.php");
Twocheckout::privateKey('7F439927-125B-41D7-9FA3-7FDA61FD380A');
Twocheckout::sellerId('203654795');
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$complete_name=$_SESSION['complete_name'];
$address1 = $_SESSION['address1'];
$city = $_SESSION['city'];
$state = $_SESSION['state'];
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];
$shipping_address_line1 = $_SESSION['shipping_address_line1'];
$shipping_address_line2 = $_SESSION['shipping_address_line2'];
$shipping_city = $_SESSION['shipping_city'];
$shipping_state = $_SESSION['shipping_state'];
$shipping_country = $_SESSION['shipping_country'];
$shipping_zipcode = $_SESSION['shipping_zipcode'];
$phone_no= $_SESSION['phone_no'] ;
$email_address= $_SESSION['emailaddress'] ;
$today = date("Y-m-d");
$tmp = 0;
    $sess = session_id();
    $query = "select * from cart where cart_sess = '$sess'";
    $results = mysqli_query($connect, $query) or die(mysql_error());
    if (mysqli_num_rows($results) >= 1) {
        $query = "select * from customers where email_address = '$email_address'";
        $result = mysqli_query($connect, $query) or die(mysql_error());
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        extract($data);
        $query = "select * from orders";
        $result = mysqli_query($connect, $query) or die(mysql_error());
        $id = mysqli_num_rows($result)+1;
        $query = "INSERT INTO orders (order_date, email_address, customer_name, shipping_address_line1, shipping_city, shipping_state, shipping_country, shipping_zipcode) 
        VALUES (NOW(), '$email_address', '$complete_name','$address_line1', '$city', '$state', '$country', '$zipcode')";
        mysqli_query($connect, $query) or die(mysql_error());
        echo"<form action='https://sandbox.2checkout.com/checkout/purchase' method='post'>
             <input type='hidden' name='sid' value='901378362' />
             <input type='hidden' name='mode' value='2CO' />";
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
                extract($row);
                $query = "INSERT INTO orders_details (order_no, item_code, item_name, quantity, price) 
                VALUES ('$id', '$cart_itemcode','$cart_item_name', '$cart_quantity', '$cart_price')";
                mysqli_query($connect, $query) or die(mysql_error());
                echo "<input type='hidden' name='li_{$tmp}_type' value='product' />
                      <input type='hidden' name='li_{$tmp}_name' value='$cart_item_name' />
                      <input type='hidden' name='li_{$tmp}_quantity' value='$cart_quantity' />
                      <input type='hidden' name='li_{$tmp}_price' value='$cart_price' />";
                      $tmp += 1;
            }
        echo "<input type='hidden' name='card_holder_name' value='$complete_name' />
              <input type='hidden' name='street_address' value='$address_line1' />
              <input type='hidden' name='city' value='$city' />
              <input type='hidden' name='state' value='$state' />
              <input type='hidden' name='zip' value='$zipcode' />
              <input type='hidden' name='country' value='$country' />
              <input type='hidden' name='email' value='$email_address' />
              <input type='hidden' name='phone' value='$cellphone_no' />";
        echo "<tr><td><br>";
        echo "There are products chosen in the cart worth $$cartamount<br>If you have finished Shopping ";
        echo "<button class='button' type='sumbit' style='vertical-align:middle;'><span>Click Here</span></button>to purchasing by selecting items from the menu";
        echo "</form>";
        $query = "DELETE FROM cart WHERE cart_sess = '$sess'";
        mysqli_query($connect, $query) or die(mysql_error());
    } else {
        echo "You can do purchasing by selecting items from the menu on left side";
    }
?>