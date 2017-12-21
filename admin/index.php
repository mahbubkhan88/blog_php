<?php
    include_once "../Blog_Classe.php";
    $obj = new Blog_Classe();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
    <section id="content">
        <?php
            if(isset($_POST['AdminLogin'])){
                $adminInfo = $obj->adminLogin($_POST['username'],$_POST['password']);
                    if(mysqli_num_rows($adminInfo)>0){
                        $row = mysqli_fetch_array($adminInfo);
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['login'] = 'login';
                        if($row > 0){
                            echo"<script>window.location.href='home.php'</script>";
                        } else {
                            echo "<span style='color:red; font-size: 18px;'>No Result Found !!</span>";
                        }
                    } else {
                        echo "<span style='color:red; font-size: 18px;'>Username or Password not matched !!</span>";
                    }
            }
        ?>
        <form action="index.php" method="post">
            <h1>Admin Login</h1>
            <div>
                <input type="text" placeholder="Username" required="" name="username" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" name="password" />
            </div>
            <div>
                <input type="submit" value="Login" name="AdminLogin" />
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="forgotpassword.php">Forgot Password !</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>