<?php
include('query.php');
include('header.php');
?>

 <!-- Blank Start -->
           <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-10 p-5">
                        <h3>Categories</h3>
                        <form action="query.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Desdcription</label>
                              <input type="text" name="cDes" id="" class="form-control" placeholder=""
                              aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <button name="addCategory" class="btn btn-info mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
      

<?php
include('footer.php');
?>