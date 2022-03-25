<?php
    include_once './init.php';

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!$email) {
            $errors['email'] = 'The email is required!';
        }
        if (!$password) {
            $errors['password'] = 'The password is required!';
        }

        if (count($errors) == 0) {
            $sql = "SELECT * FROM users WHERE `email`='$email' and `password`='$password'";
            $result = mysqli_query($conn, $sql);

            if ($user = mysqli_fetch_assoc($result)) {
                $_SESSION['auth'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];
                redirect('home.php');
            }
            
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <h2 class="text-white text-center">Login</h2>
            </div>
            <div class=" nav col-md-8">
               <!-- <a class="nav-link text-white bar mx-auto" href="home.php">Home</a>-->
               <!-- <a class="nav-link text-white bar mx-auto" href="reg.php">Register</a>-->
                <!-- <a class="nav-link text-white bar mx-auto" href="#">Login</a>-->
                <a class="nav-link text-white bar mx-auto" href="http://">About</a>
               <!-- <a class="nav-link text-white bar mx-auto" href="http://">Profile</a>-->

            </div>
        </div>
    </div>
    <!--**********************nav bar end*****************-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-3 mx-auto">
                <img class="container-fluid rounded-pill" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAMy-56W7tXzsXwfP6lY-WMlCMBEZaBMktmg&usqp=CAU" alt="Dog Photo">
            </div>
        </div>
    </div>
    <div class="container bg-success rounded-2">
        <div class="row">
            <form class="col-md-6 mx-auto" action="login.php" method="POST">
                <h2 class="text-white text-center">Login</h2>
                <div class="form-floating">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                    <?php if(isset($errors['email'])):?>
                    <div><?php echo $errors['email'];?></div>
                    <?php endif; ?>
                    <label for="email">Email</label>
                    <h3 class="form-text text-white">Enter Your Email</h3>
                </div>
                <div class="form-floating my-4">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <?php if(isset($errors['password'])):?>
                    <div><?php echo $errors['password']; ?></div>
                    <?php endif; ?>
                    <label for="password">Password</label>
                    <h3 class="form-text text-white">Enter Your Password</h3>
                </div>
                <button class="btn btn-primary w-25" type="submit">Login</button>
                <button class="btn btn-secondary mx-3" type="reset">Clear</button>
                <div class="my-3">
                    <span class="text-white ">If Not Have Account<a href="reg.php">Register Now</a></span>
                </div>
            </form>

        </div>
    </div>
    <footer class="container my-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4>Copy Right &copy; 2022 By BIB Training MM</h4>
            </div>
        </div>

    </footer>
</body>

</html>