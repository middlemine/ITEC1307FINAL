<!doctype html>


<head>

        <title>Bintu Online Bazar</title>

      
        
        <style>
                .navbar {
                    overflow: hidden;
                    background-color: #333;
                    font-family: Arial, Helvetica, sans-serif;
                }
                
                .navbar a {
                    float: left;
                    font-size: 16px;
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
                    font-size: 16px;    
                    border: none;
                    outline: none;
                    color: white;
                    padding: 14px 16px;
                    background-color: inherit;
                    font-family: inherit;
                    margin: 0;
                    
                    
                }
                
                .navbar a:hover, .dropdown:hover .dropbtn {
                    background-color: black;
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
                    padding: 0;
                    border: none;
                    background: none;
                    text-align:right;
                }

                 .searcher a:hover {
                    background-color: #ddd;
                }

                .footer {
                    background-color: #F1F1F1;
                    text-align: center;
                    padding: 10px;
                }
            }
        </style>

                

<body>

        <div class="navbar">

                <a href="index.php">Home</a>

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

                      <div class="dropdownR">

                       <td bgcolor="#969296" ><a href="cart.php"><img style="float:right;max-width:20px;
                        max-height:20px;width:auto;height:auto;" src="images/cart.png"></img>
                        <span id="cartcountinfo"></span></a><!-- #3 -->
                        </td></tr>

                        

                        

                        <form method="post" action="searchitems.php"> <br>

                        <input size="50" type="text" name="tosearch" >
                        <input type="submit" name="submit" value="Search" style="border:none;width:60px;height:22px;background-color:#333;color:white">
                        </form></td>

       
                        </div>
                    </div>
  
                   
                    <div class="footer">
                    <p>All right reserved © by MutTeam2018</p>
                    </div>


              
        
        
        </body>





</html>