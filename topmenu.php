<!DOCTYPE html>
<head>
<meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





                    <script language="JavaScript" type="text/JavaScript">
                    function makeRequestObject(){
                    var xmlhttp=false;
                    try {
                    xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); // #1
                    } catch (e) {
                    try {
                    xmlhttp = new
                    ActiveXObject('Microsoft.XMLHTTP'); // #2
                    } catch (E) {
                    xmlhttp = false;
                    }
                    }
                    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                    xmlhttp = new XMLHttpRequest(); // #3
                    }
                    return xmlhttp;
                    }
                    function updateCart(){ // #4
                    var xmlhttp=makeRequestObject();
                    xmlhttp.open('GET', 'countcart.php', true); // #5
                    xmlhttp.onreadystatechange = function(){ // #6
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // #7
                    var ajaxCart = document.getElementById("cartcountinfo  "); // #8
                    ajaxCart.innerHTML = xmlhttp.responseText;
                    }
                    }
                    xmlhttp.send(null);
                    }
                    </script>

                   
                    
                    



</head>
<body>
        
<div class="navbar">

<a href="index.php">JUST BUY IT</a>

<div class="dropdown">
        <button class="dropbtn" >Electronics</a>
        </button>

        <div class="dropdown-content">
                <a href="itemlist.php?category=CellPhone">Smart Phones</a>
                <a href="itemlist.php?category=Laptop">Laptops</a>
                <a href="index.php">Cameras </a></li>
                <a href="index.php">Televisions</a>
        </div>
        </div> 

        <!-- -->
        <div class="dropdown">
        <button class="dropbtn" >Home & Furniture</a>
        </button>


        <div class="dropdown-content">
        <a href="index.php">Kitchen Essentials</a>
        <a href="index.php">Bath Essentials</a>
        <a href="index.php">Furniture</a>
        <a href="index.php">Dining & Serving</a>
        <a href="index.php">Cookware</a>
        </div>
    </div> 
      
      <a href="index.php">Books</a>

    <!-      break             ->

      <div class="dropdownR">
      

       <td bgcolor="#969296" ><a href="cart.php"><img style="float:right;max-width:20px;
        max-height:18px;width:auto;height:auto;" src="images/cart.png"></img>
        <span id="cartcountinfo"></span></a><!-- #3 -->
        </td></tr>


                  
         <?php
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        if (isset($_SESSION['emailaddress']))
        {
            echo "<a href=\"logout.php\" style=color:white; >Sign out</a></td></tr>";
        echo "<a href=\"logout.php\" style=color:white;  >". "Welcome " . $_SESSION['emailaddress'] . "</a></td></tr>";
        
            

       
        }
        else
        {
        echo "<a href=\"signin.php\">Sign in</a>&nbsp;&nbsp;&nbsp;";
        echo "<a href=\"validatesignup.php\">Sign up</a></td></tr>";
        }
        ?>
        

    

        
        </div>

    </div>
        
   
        



       


     


  
    


         
      

         <style>
                .navbar {
                    overflow: hidden;
                    background-color: #333;
                    font-family: Arial, Helvetica, sans-serif;
                }
                
                .navbar a {
                    float: left;
                    font-size: 15px;
                    color: white;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                }
                
                .dropdown {
                    float: left;
                    overflow: hidden;
                }

               

            

                
                
                .dropdown .dropbtn {
                    font-size: 15px;    
                    border: none;
                    outline: none;
                    color: white;
                    padding: 14px 16px;
                    background-color: inherit;
                    font-family: inherit;
                    margin: 0;
                    
                    
                }
                
                .navbar a:hover, .dropdown:hover .dropbtn {
                    background-color: #f4511e;
                }
                
                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }
                
                .dropdown-content a {
                    float: none;
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                    text-align: left;
                   
                }
                
                .dropdown-content a:hover {
                    background-color: #ddd;
                }
                
                .dropdown:hover .dropdown-content {
                    display: block;
                }

                 .dropdownR {
                    float:right;
                }

                 .searcher a:hover {
                    background-color: #ddd;
                }

                /*---------------------------------------------------------------------*/

                .topnav {
                overflow: hidden;
                background-color: #333;
                }

                .topnav a {
                float: left;
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
                }

                .topnav a:hover {
                background-color: #ddd;
                color: black;
                }

                .topnav a.active {
                background-color: #2196F3;
                color: white;
                }

                .topnav .search-container {
                float: right;
                }

                .topnav input[type=text] {
                padding: 6px;
                margin-top: 8px;
                font-size: 16px;
                border: none;
                }

                .topnav .search-container button {
                float: right;
                padding: 6px 10px;
                margin-top: 8px;
                margin-right: 16px;
                background: #ddd;
                font-size: 17px;
                border: none;
                cursor: pointer;
                }

                .topnav .search-container button:hover {
                background: #ccc;
                }

                @media screen and (max-width: 600px) {
                .topnav .search-container {
                    float: none;
                }
                .topnav a, .topnav input[type=text], .topnav .search-container button {
                    float: none;
                    display: block;
                    text-align: left;
                    width: 100%;
                    margin: 0;
                    padding: 14px;
                }
                .topnav input[type=text] {
                    border: 1px solid #ccc;  
                }

                

               
            }

        </style>



        
        
</body>








