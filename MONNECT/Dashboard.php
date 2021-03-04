<?php
session_start();

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'monnect_signup_1');

$balance= $_SESSION['userID'];

$b= mysqli_query($db,"SELECT balance from signup_1 where username ='$balance'");

$rst = mysqli_fetch_array($b);


$con = mysqli_connect('localhost','root','','transfer');

    $query = 'SELECT username, amount, remark from transferd';
    $result = mysqli_query($con,$query);
    

    if($result){

       
        $table = '<table>';
        $table .= '<tr><td></td><td></td><td></td></tr>';
        
    
        while($record =mysqli_fetch_array($result))
        {
            $table .='<tr>';
            $table .='<td>' . $record['username'].'</td>';
            $table .='<td>' . $record['amount'].'</td>';
            $table .='<td>' . $record['remark'].'</td>';
            $table .='</tr>';
        }
        $table .='</table>';

    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnect - Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap');

.topnav{
   
   margin-top: 25px;
   display: flex;
   margin-bottom: 15px;
   color: white;


   flex-wrap: wrap;
   flex-direction: row;
   justify-content: space-between;
}
span{
margin-top: 4px;
color: rgb(218, 218, 218);
}

table {
    
    display:block;
  width: 500px;
  overflow: auto;
  height: 400px;
    /* border: 1px solid #ddd; */
  
}


th, td {
    text-align: left;
      width: 500px;
    padding: 8px;
}
footer, footer a{


    
padding-top: 35px;
color: rgb(155, 155, 155);
text-decoration: none;
}



        </style>
</head>
<body>
    
    

  <div class="main">

    <div class="nav">

                <header>monnect.</header>
                
                <div class="topnav" >
                <span id="usernm"><?php echo "{$_SESSION['userID']}";?> </span>
                <div class="logoutbtn" id="logoutbtn" ><a href="logout.php" id="timer">logout</a></div>
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

    <div id="dashboard" class="right">

                                                    <div class="rcontent">
                                                            <H1>Dashboard</H1>
                                                            <hr>

                                                            <div class="box">

                                                                <div class="leftbox">

                                                                    <p id="balance" class="avalablecurrency balance">$<?php echo $rst['balance']; ?> USD</p><br>
                                                                    <p class="avalablebalance balance">Avalable Balance</p>

                                                                </div>
                                                    
                                                            </div>

                                                            <hr>
                                                    
                                                        <div class="boxbelow">
                                                            <h2>Recent Transaction</h2>
                                                            <p>Username&emsp;&emsp;&emsp;&emsp;&emsp;Amount&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	Remark</p>
                                                            <br>
                                                            <!-- <p id="notrans">There are no recent transactions yet.</p> -->
                                                            <?php echo $table;  ?>
                 
                                                        </div>

            <footer>
                <span class="footer">&copy;2020 Monnect. All right reserved &nbsp; &emsp; &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a class="ap" href="#">About</a> <a class="ap" href="#">Privacy</a></span>

            </footer>
        </div>


    </div>

   



<!-- main div -->
</div>  

<script src="monnect.js"></script>

</body>
</html>
