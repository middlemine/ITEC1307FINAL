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
</style>
  
</head>

<body>

<?php
$category = $_REQUEST['category'];
$title = "Item List > " . $category;
include 'Tmenu.php';

$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");

$query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where category like '$category' order by item_code";
$results = mysqli_query($connect, $query) or die(mysql_error());
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    extract($row);
    ?>
    <div class="col-lg-3">
        <a href="itemdetails.php?itemcode=<?php echo $item_code; ?>">
            <div class="panel panel-default text-center">
                <div class="panel-body">
                <div class="zoom">
                    <img class="bottom" src="<?php echo $imagename; ?>" style="max-width:300px;max-height:200px;width:auto; height:auto;" />
                </div>
            </div>
                <div class="panel-body">
                    <font size="4"> <?php echo cut_text($item_name, 25); ?></font><br>
                    <font size="4" color="green">$ <?php echo $price; ?></font>
                </div>
            </div>
        </a>
    </div>
<?php } ?>



</body>
<?php





function cut_text($text, $num) {
    if (strlen($text) >= $num) {
        $cutstr = iconv_substr($text, 0, $num, 'utf-8') . '...';
        return $cutstr;
    } else {
        return $text;
    }
}

function json_code($json) {
    //remove curly brackets to beware from regex errors เป็นฟังชั่นสำหรับแปรข้อมูลแบบ JSON ออกมาอยู่ในรูปแบบ Array ครับ
    $json = substr($json, strpos($json, '{') + 1, strlen($json));
    $json = substr($json, 0, strrpos($json, '}'));
    $json = preg_replace('/(^|,)([\\s\\t]*)([^:]*) (([\\s\\t]*)):(([\\s\\t]*))/s', '$1"$3"$4:', trim($json));
    return json_decode('{' . $json . '}', true);
}

function DateDiff($strDate1, $strDate2) {
    return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

function TimeDiff($strTime1, $strTime2) {
    return (strtotime($strTime2) - strtotime($strTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1, $strDateTime2) {
    return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
}

function startTimer() {
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    return $time;
}

function stopAndCountTimer($start, $round = 4) {
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finish = $time;
    return round(($finish - $start), $round);
}

function expdate($startdate, $datenum) {
    $startdatec = strtotime($startdate); // ทำให้ข้อความเป็นวินาที
    $tod = $datenum * 86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
    $ndate = $startdatec + $tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
    return $ndate; // ส่งค่ากลับ
}






