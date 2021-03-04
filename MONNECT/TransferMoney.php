<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'monnect_signup_1');

$balance= $_SESSION['userID'];

$b= mysqli_query($con,"SELECT balance from signup_1 where username ='$balance'");

$result = mysqli_fetch_array($b);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnect - Transfer Money</title>
    <link rel="stylesheet" href="css/TransferMoney.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap');

        </style>
</head>
<body>
    
    

  <div class="main">

    <div class="nav">

                <header>monnect.</header>
                
                <div class="topnav" >
                <span id="username"><?php echo "{$_SESSION['userID']}";?> &emsp;&emsp;&emsp;&emsp;</span>
                <div class="logoutbtn" id="logoutbtn" ><a href="home.html" id="timer">logout</a></div>
                </div>
                <hr class="navhr">


                <div class="list">

                    <ul>
                        <li><a href="Dashboard.php" >Dashboard</a></li>
                        <li><a href="#" >Activities</a></li>
                        <li><a href="TransferMoney.php">Transfer Money</a></li>
                        <li><a href="#">Make a Request</a></li>
                    </ul>
                </div>

                <div class="profile">
                    <img src="images/settings.png" alt="">
                    <p>Profile</p>
                </div>
                <p class="contact"><a href="#">contact us</a></p>

    </div>

   <!--------------------------------------------------------------------->

   

    <div id="transfermoney" class="right transfer-money">

                    <div class="rcontent">
                        <H1>Transfer Money</H1>
                        <hr>

                        <div class="box">

                            <div class="leftbox">

                                <p id="balance" class="avalablecurrency balance">$<?php echo $result['balance']; ?> USD</p><br>
                                <p class="avalablebalance balance">Avalable Balance</p>

                            </div>
                
                        </div>            
                            
                    <div class="boxbelow" >  

                        <form action="transfer.php" method="POST">
                            <label for="transferto">Transfer to:</label>
                            <input type="text" id="transferto" name="transferto" placeholder="username" required><br><br>
                            <label for="transferamount">Transfer amount:</label>
                            <input type="number" id="transferamount" name="transferamount" min="0" required><br><br>
                            <label for="remark"></label>
                            <input type="text" class="remark" id="remark" name="remark" placeholder="Remark"><br><br>
                            <button class="cta" >Proceed</button>
                            
                            <!-- <div class="button">
                                <a href="#" class="cta " onclick="prompt">Proceed</a>
                            </div> -->
                        </form>

                          
                  


                        
                    </div>
                    

                    <footer class="ftr-1">
                    <span class="footer">&copy;2020 Monnect. All right reserved &nbsp; &emsp; &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a class="ap" href="#">About</a> <a class="ap" href="#">Privacy</a></span>

                    </footer>
                    </div>


</div>




<!-- main div -->
</div>  

<script src="monnect.js"></script>
<script src="transfer.js"></script>
</body>
</html>