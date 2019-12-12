<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Add Product</title>
</head>
<body>
    <?php 
        require('connect.php');

        if(isset($_POST['add'])) {
            $name = $_POST['nameProduct'];
            $quality = $_POST['qualityProduct'];
            $status = $_POST['statusProduct'];
            $statusInt = (int)$status;

            if(!empty($name) && !empty($quality)) {
                $sql = "INSERT INTO 
                        products (name_product, quality_product, status) 
                        values ('$name', '$quality', '$statusInt')";
                $result = mysqli_query($conn, $sql);
                header('location:dashboard.php');
            }
        }
        mysqli_close($conn);
    ?>

    <section>
        <div class='container'>
            <div class='title_section'>
                <h2>Add Product</h2>
            </div>
            <form action="add.php" method='POST'>
                <div class='group'>
                    <label for="name_product">Name Product:</label>
                    <input type="text" name='nameProduct' id='name_product'/>
                </div>
                <div class='group'>
                    <label for="quality_product">Quality Product:</label>
                    <input type="text" name='qualityProduct' id='quality_product'/>
                </div>
                <div class='group'>
                    <label for="status_product">Status:</label>
                    <select name="statusProduct" id="status_product">
                        <option value="1">Active</option>
                        <option value="0">No Active</option>
                    </select>
                </div>
                <button type='submit' name='add'>Add</button>
            </form>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>