<?php
include_once './init.php';
if (!isset($_SESSION['auth'])) {
    redirect('login.php');
}
?>





<!DOCTYPE html>
<html lang="en">

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

<body>
    <!--**********************nav bar*****************-->
    <div class="container-fluid">
        <div class=" row bg-dark">
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card-header">
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        echo "$title";

                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>