<?php 
include_once 'init.php';
if(!isset($_GET['post_id'])){
	redirect('home.php');
}

$id = $_GET['post_id'];
$sql = "SELECT * FROM post WHERE ID = '$id' ";
$result = mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);
