<?php
include_once './init.php';
if(!isset($_SESSION['auth'])) {
	redirect('login.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (!$email) {
				$errors['email'] = 'The email is required!';
		}
		if (!$password) {
				$errors['password'] = 'The password is required!';
		}

		if (count($errors) == 0) {
				$sql = "UPDATE `users` SET `name`=['$name'],`password`=['$password'] WHERE `id` = ['$id'] ";
				$result = mysqli_query($conn, $sql);

				if ($user = mysqli_fetch_assoc($result)) {
						$_SESSION['auth'] = [
								'id' => $user['id'],
								'name' => $user['name'],
								'email' => $user['email'],
						];
						
				}
				redirect('profile.php');
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
	<title>Edit-Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
        /*************nav bar**********************/
        .bar{
            transition: 1s;
        }
        .bar:hover{
            background: blue;
            border-radius: 5px;
            
        }
    </style>
<body>
<div class="container-fluid">
        <div class=" row bg-primary">
            <div class=" col-md-4">
                <h2 class="text-white text-center"><?php echo $_SESSION['auth']['name']; ?></h2>
            </div>
            <div class=" nav col-md-8">
                <a class="nav-link text-white bar mx-auto" href="./home.php">Home</a>
              <!-- <a class="nav-link text-white bar mx-auto" href="reg.php">Register</a>
                <a class="nav-link text-white bar mx-auto" href="login.php">Login</a>
                <a class="nav-link text-white bar mx-auto" href="logout.php">Logout</a> 
                <a class="nav-link text-white bar mx-auto" href="./profile.php">Profile</a> -->
            
            </div>
        </div>
    </div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 card my-5 rounded bg-primary text-white">
					<div class="card-header text-center"><h2>Profile Edit</h2></div>
					<div class="card-body text-center">
					<form class="col-md-6 mx-auto" action="./profile.php" method="POST">

					<input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id']; ?>">
                <div class="form-floating">
                    <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['auth']['name']; ?>">
                    <?php if(isset($errors['name'])):?>
                    <div><?php echo $errors['name'];?></div>
                    <?php endif; ?>
                    <label for="email">Name</label>
                    <h3 class="form-text text-white">Name Change</h3>
                </div>
                <div class="form-floating my-4">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <?php if(isset($errors['password'])):?>
                    <div><?php echo $errors['password']; ?></div>
                    <?php endif; ?>
                    <label for="password">Password</label>
                    <h3 class="form-text text-white">Change Password</h3>
                </div>
            </form>
					</div>
					<div class="card-footer mx-auto">
					<a href="" class="btn btn-success " type="submit">Update</a>
                <a href="./profile.php" class="btn btn-secondary mx-3" type="reset">Cancle</a>
					</div>
				</div>
			</div>
		</div>
</body>
</html>