   
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php

    require('connect.php');
    session_start();

    if(isset($_POST['btn_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(!empty($username) && !empty($password)) {
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['password'] == md5($password)) {
                    $session_user = [
                        'id' => $row['id'],
                        'username' => $row['username']
                    ];
                    $_SESSION['user'] = $session_user;
                    header('location:dashboard.php');
                } 
            }
        }
    }
    mysqli_close($conn);
    ?>

    <form action="index.php" method='post' id='login' name='login'>
    <div class='login_group'>
        <label for="username">Username</label>
        <input type="text" value='' id='username' name='username'/>
    </div>
    <div class='login_group'>
        <label for="password">Password</label>
        <input type="text" value='' id='password' name='password'/>
    </div>
    <button type='submit' name='btn_submit'>Login</button>
    </form>
</body>
</html>