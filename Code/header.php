<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="navbar">
    <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
    <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
<?php
if(isset($_SESSION['user_id'])){
     echo'<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>';
}else{
    echo'<a href="login.php"><i class="fas fa-sign-in-alt"></i> LogIn</a>';
}
?>
</div>
