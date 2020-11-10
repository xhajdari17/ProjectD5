<?php
session_start();
if($_SESSION['user_type']=='1-Admin'){
	include_once 'config.php';
	if(isset($_GET['id'])){
		$conn=mysqli_connect(DB_HOST,USER,PASS,DB);
		$result=mysqli_query($conn,
					"delete from users where user_id='{$_GET['id']}';");
		if($result) {
            echo '<script language="javascript">';
            echo 'alert("User was sucessfully deleted")';
            echo '</script>';

        }	 
	}
	
} else {
	echo "You are not authorized to access this file";
}
header("Location: a_index.php");
?>