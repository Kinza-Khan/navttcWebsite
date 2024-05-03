<?php
include('query.php');
include('header.php');
?>

 <!-- Blank Start -->
           <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-10 p-5">
                        <h3>Categories</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Desdcription</label>
                              <input type="text" name="pDes" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" name="pQty" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                              </div>
                            <div class="form-group">
                              <label for="">Price</label>
                              <input type="text" name="pPrice" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Category</label>
                                <select class="form-control" name="cId" id="">
                                    <option value="">Select Category</option>

                                    <?php
                                    $query = $pdo->query("select * from categories");
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