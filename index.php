<?php
    session_start();
    require_once('actions/db_connect.php');
    require_once('components/boot.php');
    // require('check_user.php');
    $sql = "SELECT * FROM products"; 
    $result = mysqli_query($connect, $sql);
    $tbody = '';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $tbody .= "<tr>
                        <td><img class='img-thumbnail' src='pictures/".$row['picture']."'</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td><a href='components/update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>View</button></a>
                        </td>
                    </tr>";
        }; 
    } else {
        $tbody = "<tr><td colspan='5'><center>No Data Available</center></td></tr>"; 
    }
    // echo var_dump($result);

    
    $connect->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_Application</title>
</head>
<body>
    <div class="manageProduct w-75 mt-3">
        <div class="mb-3 row">
            <a class="col-md-6" href="components/create.php"><button class="btn btn-primary" type="button">Add product</button></a>
            <a class="col-md-6" href="logout.php?logout"><button class="btn btn-danger" type="button">Log Out</button></a>
        </div>
        <p class="h2">Products</p>
        <table class="table table-striped">
            <thead class="table-sucess">
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
