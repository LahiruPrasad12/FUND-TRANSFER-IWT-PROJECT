<?php


session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'monnect_signup_1');

$streetaddress = $_POST['streetaddress'];
$apt = $_POST['apt'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];

$s = "SELECT * from signup_2 where phone='$phone'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    
}
else{
    $reg="INSERT into signup_2 ( streetaddress,apt,state,city,zip,phone) values ('$streetaddress','$apt','$state','$city','$zip','$phone')";
    mysqli_query($con,$reg);
    
header('location:home.html');

}















// $streetaddress = $_POST['streetaddress'];
// $apt = $_POST['apt'];
// $state = $_POST['state'];
// $city = $_POST['city'];
// $zip = $_POST['zip'];
// $phone = $_POST['phone'];

// if(!empty($streetaddress)||empty($apt)||empty($state)||empty($city)||empty($zip)||empty($phone)){

//     $host="localhost";
//     $dbUsername="root";
//     $dbPassword="";
//     $dbname="monnect_signup_1";

//     $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
//     if(mysqli_connect_error()){
//         die('connect error ('.mysqli_connect_errno().')'. mysqli_connect_error());}
//         else{
          
//             $INSERT ="INSERT Into signup_2 (streetaddress, apt, state,city,zip,phone)  values(?,?,?,?,?)";


//             if($rnum==0){
//                 $stmt->close();
//                 $stmt=$conn->prepare($INSERT);
//                 $stmt->bind_param("sssss",$streetaddress,$apt,$state,$city,$zip,$phone);
//                 $stmt->execute();

               
//                 header('location:home.html');
                
//             }
//             else{
//                 echo"someone already registerd using this username";
//             }
//             $stmt->close();
//             $conn->close();



//         }
//     }


// else{
//     die();
// }

?>
