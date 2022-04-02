<?php
include_once 'init.php';
//include_once './post-create.php';
if (!isset($_SESSION['auth'])) {
    redirect('login.php');
}
$sql = "SELECT * FROM post";
$result = mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);

?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Lover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        /*************nav bar**********************/
        .bar {
            transition: 1s;
        }

        .bar:hover {
            background: blue;
            border-radius: 5px;

        }
    </style>
</head>

<body class="bg-light">
    <!--**********************nav bar*****************-->
    <div class="container-fluid">
        <div class=" row bg-success">
            <div class=" col-md-4">
                <h2 class="text-white text-center"><?php echo $_SESSION['auth']['name']; ?></h2>
            </div>
            <div class=" nav col-md-8">
                <a class="nav-link text-white bar mx-auto" href="./home.php">Home</a>
                <a class="nav-link text-white bar mx-auto" href="./post-create.php">Create Post</a>
                <a class="nav-link text-white bar mx-auto" href="login.php">Login</a>
                <a class="nav-link text-white bar mx-auto" href="logout.php">Logout</a>
                <a class="nav-link text-white bar mx-auto" href="./profile.php">Profile</a>

            </div>
        </div>
    </div>
    <!--**********************nav bar end*****************-->
    <?php if(isset($post)): ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <form action="" method="GET">
                <div class="card-header ">
                    <h3><?php echo $post['title']; ?></h3>
                </div>
                <div class="card-body ">
                    <p><?php echo $post['body']; ?></p>
                </div>
                <div class="card-footer bg-secondary">
                    <?php 
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn,$sql);
                    $user = mysqli_fetch_assoc($result);
                    ?>
                    <p>Posted by <b><?php echo $user['name']; ?></b> <i><?php echo date('M d,Y'); ?></i></p>
                    <a class="btn btn-success" href="post-edit.php">Edit</a>
                    <a class="btn btn-danger" href="<?php echo('post-delete.php?post_id=' . $post['id']); ?>">Delete</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>