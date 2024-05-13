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
                $_SESSION['userEmail'] = $user['email'];
                $_SESSION['userName'] = $user['name'];

                echo "<script>
                location.assign('index.php');
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
if(isset($_GET['checkout'])){
    $userId = $_SESSION['userId'];
    $userEmail = $_SESSION['userEmail'];
    $userName = $_SESSION['userName'];
    if(isset($_SESSION['cart'])){
        if(count($_SESSION['cart'])>0){
    foreach($_SESSION['cart'] as $key => $value){
        $p_id = $value['p_id'];
        $p_name = $value['p_name'];
        $p_price = $value['p_price'];
        $p_qty = $value['qty'];
        $query = $pdo->prepare("insert into orders(uId , uName , uEmail , pId , pName , pPrice , pQty ) values(:uId , :uName , :uEmail , :pId , :pName , :pPrice , :pQty)");
        $query->bindParam('uId',$userId);
        $query->bindParam('uEmail',$userEmail);
        $query->bindParam('uName',$userName);
        $query->bindParam('pId',$p_id);
        $query->bindParam('pName',$p_name);
        $query->bindParam('pPrice',$p_price);
        $query->bindParam('pQty',$p_qty);
        $query->execute();


        // update product 
         // Subtract ordered quantity from products table
         $updateQuery = $pdo->prepare("UPDATE products SET qty  = qty - :orderedQty WHERE id = :productId");
         $updateQuery->bindParam('orderedQty', $p_qty);
         $updateQuery->bindParam('productId', $p_id);
         $updateQuery->execute();
          echo "<script>
          alert('order placed successfully')
    location.assign('shoping-cart.php');
    </script>";
        

    }
}
}
else{
    echo "<script>
    alert('your cart is Empty')
location.assign('shoping-cart.php');
</script>";
}
    unset($_SESSION['cart']);
}
?>

