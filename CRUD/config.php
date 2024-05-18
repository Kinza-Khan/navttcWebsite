<?php
    include('dbcon.php');

                $query = $pdo->query("select * from users");
                 $allUsers = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($allUsers as $user){
                ?>
                <tr>
                    <td scope="row"><?php echo $user['name']?></td>
                    <td><?php echo $user['email']?></td>
                    <td><?php echo $user['password']?></td>
                </tr>
                    <?php
                    }
                    ?>