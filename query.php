<?php
include('adminPanel/dbcon.php');
session_start();

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
           $user = $query->fetch(PDO::FETCH_ASSOC);
           if($user){
                $userEmailErr = "Email is already Exist";
           }

        }

        if(empty($_POST['userPassword'])){
            $userPasswordErr = "Enter Your Password";
        }

        if(empty($_POST['userConfirmPassword'])){
            $userConfirmPasswordErr = "Enter Your Confirm Password";
        }
        else{
            if($userPassword !== $userConfirmPassword){
                    $userConfirmPasswordErr = "password is not matched";
            }
        }
        if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr) ){
                $hashPassword = sha1($userPassword);
                $query = $pdo->prepare("insert into users (name , email , password) values (:name , :email , :password)");
                $query->bindParam('name',$userName);
                $query->bindParam('email',$userEmail);
                $query->bindParam('password',$hashPassword);
                $query->execute();
                echo "<script>alert('added');
                location.assign('signup.php')
                </script>";
        }
}




if(isset($_POST['signIn'])){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    if(empty($_POST['userEmail'])){
        $userEmailErr = "Enter Your Email";
    }
    if(empty($_POST['userPassword'])){
        $userPasswordErr = "Enter Your Password";
    }
    if( empty($userEmailErr) && empty($userPasswordErr)){
        $hashPassword = sha1($userPassword);
        $query = $pdo->prepare("select * from users where email = :email");
        $query->bindParam('email',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
        if($user['password'] === $hashPassword){

            if($user['role_id'] == 1){
                $_SESSION['adminId'] = $user['id'];
                $_SESSION['adminEmail'] = $user['email'];

                echo "<script>
                location.assign('adminPanel/index.php');
                </script>";
            }
            else if($user['role_id'] == 2){
                $_SESSION['userId'] = $user['id'];
                $_SESSION['user
                
                Email'] = $user['email'];

                echo "<script>
                location.assign('adminPanel/index.php');
                </script>";
            }

        
    }
    else{
        echo "<script>
        location.assign('signin.php?error=invalid credentials')
        </script>";
    }
}
else{
    echo "<script>
    location.assign('signin.php?error=iuser not found');
    </script>";
}
}
}
?>

