   <?php
            include ('menu.php');

            $connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");

            /*
            * "host" ,
            * "user" ,
            * "password" ,
            * "database" ,
            * "or die" mean : If do false will do  or die will check problem.  
            * @ABC mean ignore error  */            

            $results = mysqli_query($connect, "SELECT item_code, item_name, description, imagename, price FROM products");
            /*
            * ตัวแปรค่าข้อมูลเชื่อมต่อ DATABASE และคำสั่ง SQL
            */

            for(;
            $row1 = mysqli_fetch_array($results);){
            /* ค่าตัวแปรผลลัพธ์ของ SQL ของ ข้อมูลแถวที่ 1 */

            extract($row1); // แตกค่า Array เป็นตัวแปร $itemcode, $item_name ตามคำสั่ง SQL

            echo $item_code;
            echo "<img src='$imagename' style='max-width:220; width:auto;hight:auto;'></img>";
            }

?>