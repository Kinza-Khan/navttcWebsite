<?php
include('query.php');
include('header.php');
?>


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT categories.name as 'categoryName' , categories.id  as cId , products.*
    FROM products 
    JOIN 
    categories
    ON
    categories.id = products.c_id where products.id = :pId");
    $query->bindParam('pId',$id);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($product); 
    
}

?>
 <!-- Blank Start -->
           <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-10 p-5">
                        <h3>Categories</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input value="<?php echo $product['name']?>" type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Desdcription</label>
                              <input type="text" value="<?php echo $product['des']?>" name="pDes" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" value="<?php echo $product['qty']?>"  name="pQty" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                              </div>
                            <div class="form-group">
                              <label for="">Price</label>
                              <input type="text" value="<?php echo $product['price']?>" name="pPrice" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <img src="img/<?php echo $product['image']?>" height="100px" alt="">
                            </div>
                            <div class="form-group">
                              <label for="">Category</label>
                                <select class="form-control" name="cId" id="">
                                    <option value="<?php echo $product['cId']?>"><?php echo $product['categoryName']?></option>

                                    <?php
                                    $query = $pdo->prepare("select * from categories where name != :cName");
                                    $query->bindParam('cName',$product['categoryName']);
                                    $query->execute();
                                    $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach( $allCategories  as $category){
                                    ?>
                                         <option value="<?php  echo $category['id'] ?>"><?php echo $category['name']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                             
                            </div>
                            <button name="addProduct" class="btn btn-info mt-3">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
      

<?php
include('footer.php');
?>