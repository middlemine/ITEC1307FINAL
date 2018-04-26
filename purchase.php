<HTML>
<HEAD>
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

    .BBB{
        width: 20%;
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
</HEAD>
<BODY>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$complete_name=$_POST['complete_name'];
$address1 = $_POST['address1'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$country = $_POST['country'];
$shipping_address_line1 = $_POST['shipping_address_line1'];
$shipping_address_line2 = $_POST['shipping_address_line2'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];
$shipping_country = $_POST['shipping_country'];
$shipping_zipcode = $_POST['shipping_zipcode'];
$phone_no= $_POST['phone_no'] ;
$_SESSION['complete_name'] =$complete_name;
$_SESSION['address1'] =$address1;
$_SESSION['city'] =$city;
$_SESSION['state'] =$state;
$_SESSION['zipcode'] =$zipcode;
$_SESSION['country'] =$country;
$_SESSION['shipping_address_line1'] =$shipping_address_line1;
$_SESSION['shipping_address_line2'] =$shipping_address_line2;
$_SESSION['shipping_city'] =$shipping_city;
$_SESSION['shipping_state'] =$shipping_state;
$_SESSION['shipping_country'] =$shipping_country;
$_SESSION['shipping_zipcode'] =$shipping_zipcode;
$_SESSION['phone_no'] =$phone_no;
?>
    <form action='https://sandbox.2checkout.com/checkout/purchase' method='post'>
        <input type='hidden' name='sid' value='203692103' />
        <input type='hidden' name='mode' value='2CO' />
        <?php 
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
                extract($row);
                $query = "INSERT INTO orders_details (order_no, item_code, item_name, quantity, price) 
                VALUES ('$id', '$cart_itemcode','$cart_item_name', '$cart_quantity', '$cart_price')";
                mysqli_query($connect, $query) or die(mysql_error());
                echo "
                <input type='hidden' name='li_{$tmp}_type' value='product' />
                <input type='hidden' name='li_{$tmp}_name' value='$cart_item_name' />
                <input type='hidden' name='li_{$tmp}_quantity' value='$cart_quantity' />
                <input type='hidden' name='li_{$tmp}_price' value='$cart_price' />";
                $tmp += 1;
                }
                echo "
                    <input type='hidden' name='card_holder_name' value='$complete_name' />
                    <input type='hidden' name='street_address' value='$address_line1' />
                    <input type='hidden' name='city' value='$city' />
                    <input type='hidden' name='state' value='$state' />
                    <input type='hidden' name='zip' value='$zipcode' />
                    <input type='hidden' name='country' value='$country' />
                    <input type='hidden' name='email' value='$email_address' />
                    <input type='hidden' name='phone' value='$cellphone_no' />
                    ";?>
          </form>
</table>
</form>
</BODY>
</HTML>
