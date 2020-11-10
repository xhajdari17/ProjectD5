<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_type']=='1-Admin')
        header("Location: a_index.php");
    else
        header("Location: std_index.php");
}
else if(isset($_POST['blogin']))
{
include_once('config.php');
$conn=mysqli_connect(DB_HOST,USER,PASS,DB);
$email=$_POST['email'];
    $password=sha1($_POST['password']);
$sql="SELECT * FROM users WHERE user_email='$email' AND user_pass='$password'";

$result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
		$_SESSION['user_id']=$row['user_id'];
		 $_SESSION['user_name']=$row['user_name'];
		  $_SESSION['user_email']=$row['user_email'];
		 $_SESSION['user_type']=$row['user_type'];
        if ($_SESSION['user_type']=='1-Admin'){
            header("Location: a_index.php");
        }
        else if($_SESSION['user_type']== '2-Student'){
            header("Location:std_index.php");
	}}
    else if (mysqli_num_rows($result)==0){
        echo '<script language="javascript">';
        echo 'alert("Invalid email or password")';
        echo '</script>';
    }}

else {
    ?>


<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('images/elearn.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<div class="container">
<br><hr>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">WELCOME TO E-COURSE</h4>
	<h3 class="text-center">LOGIN</h3>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<div class="form-group input-group">
		
        
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email"  value="<?=isset($_POST['email'])?$_POST['email']:""?>"class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	
		
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
		 <input name="password"  value="<?=isset($_POST['password'])?$_POST['password']:""?>"class="form-control" placeholder="Password" type="password">
       
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" name="blogin"  class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->
</form>
</article>
</div> <!-- card.// -->
</div> 
<!--container end.//-->
<br><br>
    <?php include 'footer.php'; ?>
</html>
<?php } ?>
