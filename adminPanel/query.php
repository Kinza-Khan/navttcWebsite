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
?>