<?php
include('query.php');
include('header.php');
?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-10">
                        <h3>This is Product page</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("SELECT categories.name as 'categoryName' , products.*
                                FROM products 
                                JOIN 
                                categories
                                ON
                                categories.id = products.c_id");
                                $allproducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allCategories);
                                foreach($allproducts as $product){
                                ?>
                                <tr>
                                    <td><?php echo $product['name']?></td>
                                    <td><?php echo $product['des']?></td>
                                    <td><?php echo $product['price']?></td>
                                    <td><?php echo $product['qty']?></td>
                                    <td><img height="100px" src="img/<?php echo $product['image']?>" alt=""></td>
                                    <td><?php echo $product['categoryName']?></td>
                                    <td><a href="editCategory.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Edit</a></td>
                                    <td></td>
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