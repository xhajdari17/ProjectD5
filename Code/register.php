<?php
session_start();
$s = false;
if (isset($_POST['submit'])) {
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];
    }
    if (isset($_POST['user_type'])) {
        $type = $_POST['user_type'];
    }
    if (!$s) {
        $date = date('Y-m-d H:i:s');
        include_once('config.php');
        $conn = mysqli_connect(DB_HOST, USER, PASS, DB);
        $sql1 = "SELECT user_email FROM users  WHERE user_email= '{$email}'";
        $result = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result) > 0) {
            echo " <p style='color:#ff0000; text-align:center; margin:10px 0;'>Email already exists";
        } else {
            $sql2 = "INSERT INTO `users` (`user_name`, `user_pass`, `user_email`,`user_type`,`createDate`) 
   VALUES ('{$name}', '{$pass}', 
   '{$email}','{$type}','{$date}');";
            mysqli_query($conn, $sql2);
            header("Location: a_index.php");
        }
    }
} else {
    ?>

    <!DOCTYPE html>
    <html>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="style.css">

    <div class="container" style="max-width: 600px;>
        <br>
        <hr>
        <div class=" card bg-light
    ">
    <article class="card-body mx-auto" style="max-width: 400px; background: lightsteelblue;">
        <br><br> <br>
        <p class="divider-text">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        </p><br>
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" class="form-control"
                       placeholder="Full name" type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" class="form-control"
                       placeholder="Email address" type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-group">


            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <select name="user_type" class="form-control">
                    <option selected=""> Select user</option>
                    <option value="1-Admin">Admin</option>
                    <option value="2-Student">Student</option>
                </select>
            </div> <!-- form-group end.// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="pass" value="<?= isset($_POST['pass']) ? $_POST['pass'] : "" ?>" class="form-control"
                       placeholder="Create password" type="password">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Repeat password" type="password">
            </div> <!-- form-group// -->
            <div class="form-group">
                <br>
                <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account</button>
                <br>
            </div> <!-- form-group// -->
            <div class="form-group">
                <input type=button onClick="location.href='a_index.php'" value='Go Back'
                       class="btn btn-danger center-block">
            </div>
        </form>
    </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

    <br><br>
    </html>
<?php } ?>
<?php include 'footer.php'; ?>
