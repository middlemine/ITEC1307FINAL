<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  

<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");
$query = "SELECT item_code, item_name, description, imagename, price FROM
products";
$results = mysqli_query($connect, $query) or die(mysql_error());
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    extract($row);
    ?>
    <div class="col-lg-4">
        <a href="itemdetails.php?itemcode=<?php echo $item_code; ?>">
            <div class="panel panel-default text-center">
                <div class="panel-body">
                    <img class="bottom" src="<?php echo $imagename; ?>" style="max-width:300px;max-height:200px;width:auto; height:auto;" />
                </div>
                <div class="panel-body">
                    <font size="4"> <?php echo cut_text($item_name, 25); ?></font><br>
                    <font size="4" color="red">$ <?php echo $price; ?></font>
                </div>
            </div>
        </a>
    </div>
