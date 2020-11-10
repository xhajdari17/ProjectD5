<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_type']=='1-Admin')
        header("Location: a_index.php");
    else
        header("Location: std_index.php");
}
    else {
        header("Location:index.php");
    }
?>