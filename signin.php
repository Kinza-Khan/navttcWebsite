<?php
include "query.php";
include "header.php";

?>

<div class="container p-5 mt-5">
<form action="" method="post">
   
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="userEmail"  value="<?php echo $userEmail?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <small id="helpId" class="text-danger"><?php echo $userEmailErr?></small>
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="text" name="userPassword"  value="<?php echo $userPassword?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <small id="helpId" class="text-danger"><?php echo $userPasswordErr?></small>
    </div>
    
    <button class="btn btn-primary" name="signIn">Submit</button>
</form>
</div>
<?php
include_once "footer.php";
?>