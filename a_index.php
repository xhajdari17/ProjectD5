<?php
session_start();
if ($_SESSION['user_type'] == '1-Admin') {
    ?>
    <link rel="stylesheet" href="style.css">
    <?php include 'header.php'; ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        body {
            background-image: url('images/aad.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style> <br>
    <center>
        <h1 style="text-align:center; color: firebrick ;">Welcome To Admin Homepage <?= $_SESSION['user_name'] ?></h1> <br>
    <input type=button onClick="location.href='register.php'" value='Add User' class="btn btn-primary"><br><br>
    <h2>List of users in the system </h2>
    <link rel="stylesheet" href="style2.css">
    <?php
    include_once 'config.php';
    $conn = mysqli_connect(DB_HOST, USER, PASS, DB);
    $result = mysqli_query($conn, "select * from users where user_type='2-Student';");
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='2'>
        <thead>
	<tr><th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Password</th>
	<th>Type</th>
	<th>Created Date</th>
	<th>Update</th>
	<th>Delete</th></tr>
    </thead> <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['user_id']}</td>
        <td>{$row['user_name']}</td> <td> {$row['user_email']}</td>
		<td>{$row['user_pass']}</td>
		<td>{$row['user_type']}</td>
		<td>{$row['createDate']}</td>
        <td> <a href='edit.php?id={$row['user_id']}'><i class='fa fa-edit red-color' style='color: mediumseagreen'></i></a> </td> 
		<td><a href='deleteUser.php?id={$row['user_id']}'><i class='far fa-trash-alt red-color' style='color: red'></i></a></td>
		</tr> 
		";
        }

        echo"
         </tbody> 
		</center>";
    } else {
        echo "There are no users registered!!";
    }
} else {
    header("Location: login.php");
}
include 'footer.php';