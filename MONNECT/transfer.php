<?php


session_start();



$con = mysqli_connect('localhost','root','');
$db = mysqli_connect('localhost','root','');
mysqli_select_db($con,'transfer');
mysqli_select_db($db,'monnect_signup_1');

$usernm = $_POST['transferto'];
$amount = $_POST['transferamount'];
$remark = $_POST['remark'];

$_SESSION['sentTo']=$usernm;
$_SESSION['amountsent']=$amount;
$_SESSION['remarksent']=$remark;


$balance= $_SESSION['userID'];

$checkbalance= mysqli_query($db,"SELECT balance from signup_1 where username ='$balance'");

$currentB = mysqli_fetch_array($checkbalance);

$currentB['balance'];

if($currentB['balance']>$amount){

    


if($usernm != $_SESSION['userID'])
{

    $s = "SELECT * from signup_1 where username ='$usernm'";

    $result = mysqli_query($db,$s);
    
    $num = mysqli_num_rows($result);
    
    if($num ==1){

        

    //transfer money to receiver's account

    //insert data into transfer table for dashbord display
    $reg="INSERT into transferd ( username,amount,remark) values ('$usernm','$amount','$remark')";
    mysqli_query($con,$reg);

    
//fetching account balance of receiver's account for calculations     
$b= mysqli_query($db,"SELECT balance from signup_1 where username ='$usernm'");

$result = mysqli_fetch_array($b);

//adding current receiver's account balance to the receivered amount
$final= $result['balance'] + $amount;
    

//updating receiver's account balance
$trs="UPDATE signup_1 SET balance = '$final' where username ='$usernm'";
mysqli_query($db,$trs);

// debit from user account



$b= mysqli_query($db,"SELECT balance from signup_1 where username ='$balance'");

$senderbalance = mysqli_fetch_array($b);

$deduct = $senderbalance['balance'] - $amount;


$debit ="UPDATE signup_1 SET balance = '$deduct' where username ='$balance'";
mysqli_query($db,$debit);

header('location:receipt.php');
    
    
    }
    else{
    
        header('location:invaliduser.html');
        
    }

}
else{
    
    header('location:error.html');
}


}
else{

    header('location:insufficient.html');
}




?>