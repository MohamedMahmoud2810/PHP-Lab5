<?php
    include 'config.php';

    session_start();
    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $sql = "SELECT * FROM userform WHERE email = '$email' && password = '$pass' ";

        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run) > 0 ){

            $row = mysqli_fetch_array($run);


            if($row['user_type']=='admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin.php');

            }elseif ($row['user_type']=='user'){

                $_SESSION['user_name'] = $row['name'];
                header('location:user.php');
            }
        
        }else{
            $error[] = 'inncorrect email or password';
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
                if(isset($error)){
                    foreach ($error as $error ) {
                        echo '<span class = "error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="email" name="email" required placeholder="Enter Your Email" >
            <input type="password" name="password" required placeholder="Enter Your Password" >
            
            
            <input type="submit" name="submit" value="login " class="form-btn">

            <p>don't have an account? <a href="index.php">register now</a></p>
        </form>
    </div>
</body>
</html>