<?php
include('query.php');
include('header.php');
?>

 <!-- Blank Start -->

 <?php
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = $pdo->prepare("select * from categories where id = :cId");
    $query->bindParam('cId',$id );
    $query->execute();
    $singleCategory = $query->fetch(PDO::FETCH_ASSOC);
    // print_r($singleCategory);

 }
 
 ?>
           <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-10 p-5">
                        <h3>Categories</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" value="<?php echo  $singleCategory['name']?>" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Desdcription</label>
                              <input type="text" value="<?php echo  $singleCategory['des']?>" name="cDes" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <img src="img/<?php echo  $singleCategory['image']?>" height="50px" alt="">
                            </div>
                            <button name="updateCategory" class="btn btn-info mt-3">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
      

<?php
include('footer.php');
?>