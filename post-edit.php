<?php 
include_once 'init.php';
bee($_GET);
if(!isset($_GET['post_id'])){
	redirect('home.php');
}
$title = 
$id = $_GET['post_id'];
$sql = "UPDATE post SET title = '$title' , body = '$body' WHERE id = '$id' ";
