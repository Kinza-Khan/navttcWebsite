<?php
include('adminPanel/dbcon.php');


$userName =  $userEmail = $userPassword = $userConfirmPassword = "";
$userNameErr =  $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";
if(isset($_POST['signUp'])){
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $userConfirmPassword = $_POST['userConfirmPassword'];
        if(empty($_POST['userName'])){
                $userNameErr = "Enter Your Name";
        }
        if(empty($_POST['userEmail'])){
            $userEmailErr = "Enter Your Email";
        }
        else{
           $query = $pdo->prepare("select id from users where email = :email");
           $query->bindParam('email', $userEmail);
           $query->execute();
            
        }

}
?>

