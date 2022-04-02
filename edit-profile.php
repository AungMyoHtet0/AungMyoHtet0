<?php
include_once './init.php';
if(!isset($_SESSION['auth'])){
	redirect('login.php');
}

$id = $_SESSION['auth']['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
//bee($_SESSION);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!$name) {
        $errors['name'] = 'The name is required.';
    }

    if(count($errors) == 0) {
        if($password) {
            $sql = "UPDATE users SET `name`='$name', `password`='$password' where `id`='$id'";
        } else {
            $sql = "UPDATE users SET `name`='$name' where `id`='$id'";
        }
    
        $result = mysqli_query($conn, $sql);

        redirect('profile.php');
    }
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
                <!--<a class="nav-link text-white bar mx-auto" href="./post-create.php">Create Post</a>
                <a class="nav-link text-white bar mx-auto" href="logi">Login</a>
                <a class="nav-link text-white bar mx-auto" href="logout.php">Logout</a>
                <a class="nav-link text-white bar mx-auto" href="./profile.php">Profile</a>-->

            </div>
        </div>
    </div>
    <!--**********************nav bar end*****************-->
		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto mt-3">
					<div class="card-header">
						<h2>Profile Edit</h2>
					</div>
					<div class="card-body">
						<form  method="post">
							
							<input class="form-control" type="text" name="name" value="<?php echo $_SESSION['auth']['name']; ?>">
							<?php if(isset($errors['name'])): ?>
							<div><?php echo $errors['name'] ?></div>
							<?php endif; ?>
							<input class="form-control mt-3" type="password" name="password">
							<div class="card-footer mt-3">
							<input class="btn btn-success " type="submit" value="Update">
							<a class="btn btn-secondary" href="./profile.php">Cancle</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
</body>

</html>