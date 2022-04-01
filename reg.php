<?php




include_once 'init.php';

$errors=[];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$name){
        $errors['name']='Name is required!';
    };
    if(!$email){
        $errors['email']='Email is required!';
    }
    if(!$password){
        $errors['password']='Password is required!';
    }
    if(count($errors)==0){
        $sql = "INSERT INTO users (`name`, `email` , `password`) VALUES ('$name','$email','$password')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            redirect('login.php');
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
    <title>Register</title>
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
                <h2 class="text-white text-center">Register Form</h2>
            </div>
            <div class=" nav col-md-8">
                <!-- <a class="nav-link text-white bar mx-auto" href="home.php">Home</a>-->
                <!--<a class="nav-link text-white bar mx-auto" href="#reg">Register</a>-->
                <!-- <a class="nav-link text-white bar mx-auto" href="login.php">Login</a>-->
                <a class="nav-link text-white bar mx-auto" href="http://">About</a>
                <!-- <a class="nav-link text-white bar mx-auto" href="http://">Profile</a>-->

            </div>
        </div>
    </div>
    <!--**********************nav bar end*****************-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-3 mx-auto">
                <img class="container-fluid rounded-pill " src="https://live.staticflickr.com/65535/50305871576_693a6925f9_b.jpg" alt="Dog photo">

            </div>
        </div>
    </div>
    <!--********************************register form***************************-->
    <div class="container bg-success rounded-2">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="reg.php" method="POST">
                    <h2 id="reg" class="text-white text-center">Register Here</h2>
                    <div class="form-floating">
                        <input class="form-control" type="text" name="name" placeholder="Username">
                        <?php if(isset($errors['name'])):?>
                        <div><?php echo $errors['name'] ?></div>
                            <?php endif;?>
                        <label for="name">Username</label>
                        <h3 class="form-text text-white">Please Don't Use number and special Characters</h3>
                    </div>
                    <div class="form-floating my-4">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <?php if(isset($errors['email'])):?>
                        <div><?php echo $errors['email'] ?></div>
                            <?php endif;?>
                        <label for="email">Email</label>
                        <h3 class="form-text text-white">example@gmail.com</h3>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <?php if(isset($errors['password'])):?>
                        <div><?php echo $errors['password'] ?></div>
                            <?php endif;?>
                        <label for="password">Password</label>
                        <h3 class="form-text text-white">Password Must Have At Least 8 Characters</h3>
                    </div>
                    <button class="btn btn-primary my-3 w-25" type="submit">Register</button>
                    <button class="btn btn-secondary mx-3" type="reset">Clear</button>
                </form>
                <div class="my-3">
                    <span class="text-white ">Already Have Account <a href="login.php">Login</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--********************************register form***************************-->
    <footer class="container my-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4>Copy Right &copy; 2022 By BIB Training MM</h4>
            </div>
        </div>

    </footer>

</body>

</html>