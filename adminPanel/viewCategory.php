<?php
include('query.php');
include('header.php');
?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-10">
                        <h3>This is Category page</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from categories");
                                $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allCategories);
                                foreach($allCategories as $category){
                                ?>
                                <tr>
                                    <td><?php echo $category['name']?></td>
                                    <td><?php echo $category['des']?></td>
                                    <td><img height="100px" src="img/<?php echo $category['image']?>" alt=""></td>
                                    <td><a href="editCategory.php?id=<?php echo $category['id'] ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="?did=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                               <?php
                               }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->









<?php
include('footer.php');
?>