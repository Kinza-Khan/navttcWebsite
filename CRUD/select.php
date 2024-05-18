
<?php
include('query.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     
  
    <div class="container p-5">
        <input type="text" id = "inp_value" name="inp" class="form-control">
        <table class="table p-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function(){
            function selectAllData(){
                    $.ajax({
                        url : "config.php",
                        type : "post",
                        success :function(data){
                            $('tbody').html(data);
                        }
                    })
            }
            selectAllData();

            $("#inp_value").keyup(function () {
                let inpVal = $(this).val();
                if(inpVal != ""){
             $.ajax({
           url : "query.php",
        type: "post",
        data : {inp:inpVal},
        success :function(data){
        $('tbody').html(data);
        }

        })
    }
    else{
        selectAllData();
    }
                
                

            })



        })
   
    </script>
  </body>
</html>