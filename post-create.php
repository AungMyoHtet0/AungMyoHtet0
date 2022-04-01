<?php
include_once './init.php';
$errors = [];
if (!isset($_SESSION['auth'])) {
    redirect('login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['auth']['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    if (!$title) {
        $errors = 'Title is required!';
    }
    if (!$body) {
        $errors = 'Content is required';
    }

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
</head>

<body>
    <div class="container-fluid">
        <div class=" row bg-dark">
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
            <form action="./post-create.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id'] ?>">
                <div class="card-header">
                    <h2>Post Create</h2>
                </div>
                <div class="card-body">
                    <div class="form-floating">

                        <input class="form-control" type="text" name="title" placeholder="Title">
                        <?php if (isset($errors['title'])) : ?>
                            <div><?php echo $errors['title']; ?></div>
                        <?php endif; ?>
                        <label for="title">Title</label>
                    </div>
                    <div class="form-floating mt-3">
                        <textarea class="form-control" name="body" cols="30" rows="10" placeholder="Content"></textarea>
                        <label for="body">Content</label>
                    </div>
                </div>
                <div class="card-footer">
                    <p></p>
                    <button class="btn btn-success" type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>