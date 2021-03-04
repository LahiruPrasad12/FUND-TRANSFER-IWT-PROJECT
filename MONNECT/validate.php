<?php



session_start();



$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'monnect_signup_1');

$usern =$_POST['username'];
$pass =$_POST['password'];

$_SESSION['userID']=$usern;

$s = "SELECT * from signup_1 where username ='$usern' && password ='$pass'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num ==1){
header('location:dashboard.php');


}
else{

    header('location:home.html');
    
}
?>
