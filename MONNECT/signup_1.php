<?php

$username = $_POST['usernamesignup'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['passwordnew'];


if(!empty($username)||empty($firstname)||empty($lastname)||empty($email)||empty($password)){

    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="monnect_signup_1";

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error ('.mysqli_connect_errno().')'. mysqli_connect_error());}
        else{
            $SELECT ="SELECT username from signup_1 Where username=? Limit 1";
            $INSERT ="INSERT Into signup_1 (username, firstname, lastname,email,password)  values(?,?,?,?,?)";


            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->bind_result(($username));
            $stmt->store_result();
            $rnum =$stmt->num_rows();

            if($rnum==0){
                $stmt->close();
                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssss",$username,$firstname,$lastname,$email,$password);
                $stmt->execute();

                $_SESSION['username']=$username;
                header('location:signup2.html');
                
            }
            else{
                echo $username."is not avalable";
            }
            $stmt->close();
            $conn->close();



        }
    }


else{
    die();
}

?>
