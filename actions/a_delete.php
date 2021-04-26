<?php 
    require_once('db_connect.php');
    require_once('../components/boot.php');

    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture == "product.jpeg")?: unlink ("../pictures/$picture");
        $sql = "DELETE FROM products WHERE id = {$id}";
        if ($connect->query($sql) === TRUE){
            $class = "success";
            $message = "Successfully Deleted!";
        } else {
            $class="danger";
            $message = "The entry was not deleted due to : <br>" . $connect->error;
        } 
        $connect->close();
    } else {
        header("location: ../error.php");
    }
?>
<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta charset="UTF-8">
       <title>Delete</title>
   </head>
   <body>
       <div class="container">
           <div class="mt-3 mb-3">
               <h1>Delete request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?=$message;?></p>
               <a href ='../index.php'><button class= "btn btn-success" type='button'> Home</button></a>
            </div>
       </div>
   </body>
</html>