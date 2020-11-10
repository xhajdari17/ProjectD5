<?php
session_start();
include_once 'config.php';
if ($_SESSION['user_type'] == '1-Admin') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['user_id'] = $id;
    } else {
        $id = $_SESSION['user_id'];
    }
}
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
        $pass = sha1($_POST['pass']);
    }
    if (isset($_POST['user_type'])) {
        $type = $_POST['user_type'];
    }
    if (!$s) {
        $date = date("F j, Y \a\t g:ia");
        $conn = mysqli_connect(DB_HOST, USER, PASS, DB);
        $sql = "UPDATE `users`  SET `user_name`='{$name}', `user_email`='{$email}' ,`user_pass`='{$pass}', `user_type`='{$type}',`createDate`='{$date}' where user_id='{$id}';";
        mysqli_query($conn, $sql);
        if ($sql)
            echo '<script language="javascript">';
        echo 'alert("User was sucessfully updated")';
        echo '</script>';
    }
}
if (isset($_GET['id'])) {
    $conn = mysqli_connect(DB_HOST, USER, PASS, DB);
    $result = mysqli_query($conn, "select * from users where  user_id='{$_GET['id']}'");
    $data = mysqli_fetch_assoc($result);
    $name = $data['user_name'];
    $email = $data['user_email'];
    $pass = $data['user_pass'];
    $type = $data['user_type'];
}

?>
<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<div class="container">
    <br>
    <hr>
    <div class="card bg-light" style="background: lightsalmon" ;>
        <article class="card-body mx-auto" style="max-width: 400px; background: lavenderblush" ;
        ">
        <h4 class="card-title mt-3 text-center">Edit User</h4>
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <input type="hidden" name="user_id" value="1"></p>
                </div>
                <input type="hidden" name="user_id">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" value="<?= $name ?>" class="form-control" type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" value="<?= $email ?>" class="form-control" type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-group">


            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <select name="user_type" value="<?= $type ?>" class="form-control" required>
                    <option selected=""> Select user</option>
                    <option value="1-Admin">Admin</option>
                    <option value="2-Student">Student</option>
                </select>
            </div> <!-- form-group end.// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="pass" value="<?= $pass ?> class=" form-control" placeholder="Password" type="password">
            </div> <!-- form-group// -->
            <!-- form-group// -->
            <div class="form-group">
                <br>
                <button type="submit" name="submit" class="btn btn-primary btn-block"> Update</button>
            </div> <!-- form-group// -->

            <div class="form-group">
                <br><input type=button onClick="location.href='a_index.php'" value='Go Back'
                           class="btn btn-danger center-block">
            </div> <!-- form-group// -->

        </form>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->
<br><br>
</center>
<?php include 'footer.php'; ?>
</body>
</html>
