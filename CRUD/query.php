<?php
include('dbcon.php');


if(isset($_POST['inp'])){
    $inp  = $_POST['inp'];
    $query = $pdo->prepare("select * from users where name like  :val");
    $inp = "%$inp%";
    $query->bindParam('val',$inp);
    $query->execute();
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


<?php
}

?>

