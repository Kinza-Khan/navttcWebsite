<?php
include('dbcon.php');
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryImageName = $_FILES['cImage']['name'];
    $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
    $destination = "img/".$categoryImageName;
   if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
    if(move_uploaded_file($categoryImageTmpName,$destination)){
        $query =  $pdo->prepare("insert into categories (name , des , image)  values (:categoryName , :categoryDes , :categoryImage)");
        $query->bindParam('categoryName',$categoryName);
        $query->bindParam('categoryDes',$categoryDes);
        $query->bindParam('categoryImage',$categoryImageName);
        $query->execute();
        echo "<script>alert('category added successfully')</script>";
    }

   }
   else{
    echo "<script>alert('invalid')</script>";

   }

}


// update

        if(isset($_POST['updateCategory'])){
            $categoryName = $_POST['cName'];
            $categoryDes = $_POST['cDes'];
            $id = $_GET['id'];
            $query = $pdo->prepare("update categories set name = :cName , des = :cDes where id = :cId");
            if(isset($_FILES['cImage'])){
                $categoryImageName = $_FILES['cImage']['name'];
                $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
                $extension = pathinfo( $categoryImageName , PATHINFO_EXTENSION);
                $destination = "img/".$categoryImageName;
                if($extension == "jpg" || $extension == "jpeg"  || $extension == "png"){
                        if(move_uploaded_file($categoryImageTmpName,$destination)){
                            $query = $pdo->prepare("update categories set name = :cName , des = :cDes , image = :cImage where id = :cId")    ;
                            $query->bindParam('cImage',$categoryImageName);
                        }
                }
            }
                $query->bindParam('cName',$categoryName);
                $query->bindParam('cDes',$categoryDes);
                $query->bindParam('cId',$id);
                $query->execute();
                echo "<script>alert('updated');
               location.assign('viewCategory.php') 
                </script>";


        }


        // 
        if(isset($_POST['addProduct'])){
            $productName = $_POST['pName'];
            $productDes = $_POST['pDes'];
            $productPrice = $_POST['pPrice'];
            $productQty = $_POST['pQty'];
            $cId = $_POST['cId'];
            $productImageName = $_FILES['pImage']['name'];
            $productImageTmpName = $_FILES['pImage']['tmp_name'];
            $destination = "img/".$productImageName;
            $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
            if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
                if(move_uploaded_file($productImageTmpName,$destination)){
                    $query =  $pdo->prepare("insert into products (name , des ,  qty , price ,image , c_id)  values (:productName , :productDes , :productQty ,:productPrice   , :productImageName , :cId)");
                    $query->bindParam('productName',$productName);
                    $query->bindParam('productDes',$productDes);
                    $query->bindParam('productPrice',$productPrice);
                    $query->bindParam('productQty',$productQty);
                    $query->bindParam('cId',$cId);
                    $query->bindParam('productImageName',$productImageName);
                    $query->execute();
                    echo "<script>alert('product added successfully')</script>";
                }
            
               }
               else{
                echo "<script>alert('invalid')</script>";
            
               }



        }


?>