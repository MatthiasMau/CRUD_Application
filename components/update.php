<?php 

require_once('../actions/db_connect.php');
require_once('boot.php');

    if ($_GET['id']){
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = {$id}";
        $result = $connect->query($sql);
        if ($result->num_rows == 1){
            $data = $result->fetch_assoc();
            $name = $data['name'];
            $price = $data['price'];
            $picture = $data['picture'];
        } else {
            header("location: error.php");
        }
        $connect->close();
    } else {
        header("location: error.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded circle' src="../pictures/<?php echo $picture ?>" alt="<?php echo $name ?>"></legend>
        <form action="../actions/a_update.php" method="POST" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class="form-control" type="text" name="name" placeholder="Product Name" value="<?php echo $name?>" /></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class="form-control" type="number" name="price" step="any" placeholder="Price" value="<?php echo $price ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href='../index.php'><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    
</body>
</html>