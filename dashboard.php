<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Quan Ly San Pham</title>
</head>
<body>
    <?php 
        require('connect.php');
    ?>

    <section>
        <div class='container'>
            <div class='title_section'>
                <h2>Dashboard</h2>
            </div>
            <div class='add_product'>
                <a href="./add.php">Add Product</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quality</th>
                    <th>Edit</th>
                    <th>Detele</th>
                </tr>
                <?php 
                    $sql = 'SELECT * FROM products where status = 1';
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <th>
                        <h4 class='name_title'><?php echo $row['id']?></h4>
                    </th>
                    <th>
                        <h4 class='name_title'><?php echo $row['name_product']?></h4>
                    </th>
                    <th>
                        <h4 class='name_title'><?php echo $row['quality_product']?></h4>
                    </th>
                    <th>
                        <a href="./delete.php?id=<?php echo $row['id']?>">Xoa</a>
                    </th>
                    <th>
                        <a href="edit.php?id=<?php echo $row['id']?>">Sua</a>
                    </th>
                </tr>
                <?php 
                    }
                ?>
            </table>
        </div>
    </section>
    <?php 
        mysqli_close($conn);
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>