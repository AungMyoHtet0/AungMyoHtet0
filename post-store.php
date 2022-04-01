<?php
include_once 'init.php';
//bee($_SESSION);
$_SESSION['error']=[];
if (!isset($_SESSION['auth'])) {
    redirect('login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['auth']['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    if (!$title) {
        $_SESSION['error']['title'] = 'Title is required!';
    }
    if (!$body) {
        $_SESSION['error']['body'] = 'Content is required!';
    }
		if(count($_SESSION['error']) > 0){
			redirect('post-create.php');
		}
    
    $sql = "INSERT INTO post(title,body,user_id) VALUES ('$title','$body','$user_id')";
    $result = mysqli_query($conn,$sql);
    
       
        
}
redirect('home.php');

