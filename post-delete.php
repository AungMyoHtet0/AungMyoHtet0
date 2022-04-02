<?php
include_once 'init.php';
if(!isset($_GET['post_id'])){
	redirect('home.php');
}
$id = $_GET['post_id'];
$sql = "DELETE FROM post WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);

redirect('home.php');
?>