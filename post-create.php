<?php
include_once 'init.php';
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
    <title>Post-Create | Dog Lover</title>
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

<body class="bg-dark">
    <div class="container-fluid">
        <div class=" row bg-success">
            <div class=" col-md-4">
                <h2 class="text-white text-center">Post Create</h2>
            </div>
            <div class=" nav col-md-8">
                <a class="nav-link text-white bar mx-auto" href="home.php">Home</a>
                <!--<a class="nav-link text-white bar mx-auto" href="#reg">Register</a>-->
                <!-- <a class="nav-link text-white bar mx-auto" href="login.php">Login</a>-->
                <a class="nav-link text-white bar mx-auto" href="http://">About</a>
                <!-- <a class="nav-link text-white bar mx-auto" href="http://">Profile</a>-->

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <form action="./post-store.php" method="POST" class="bg-light">
                <input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id'] ?>">
                <div class="card-header">
                    <h2>Post Create</h2>
                </div>
                <div class="card-body bg-success">
                    <div class="form-floating">

                        <input class="form-control" type="text" name="title" placeholder="Title">
                        <?php if (isset($_SESSION['error']['title'])) : ?>
                            <div><?php echo $_SESSION['error']['title']; ?></div>
                        <?php endif; ?>
                        <label for="title">Title</label>
                    </div>
                        <textarea class="form-control mt-3 " name="body" rows="10" placeholder="Content"></textarea>
                        <?php if(isset($_SESSION['error']['body'])): ?>
                        <div><?php echo $_SESSION['error']['body'] ?></div>
                        <?php endif; ?>
                        
                </div>
                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="POST">
                </div>
            </form>
        </div>
    </div>
</body>
</html>