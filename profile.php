<?php
include_once 'init.php';
if(!isset($_SESSION['auth'])) {
	redirect('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
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
        <div class=" row bg-dark">
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
				<div class="col-md-6 card my-5 rounded bg-dark text-white">
					<div class="card-header text-center"><h2>Profile</h2></div>
					<div class="card-body text-center">
						<div>Name : <?php echo $_SESSION['auth']['name']; ?></div>
						<div>Email : <?php echo $_SESSION['auth']['email']; ?></div>
					</div>
					<div class="card-footer mx-auto">
                        <form action="" method="POST">
						<a class="btn btn-primary" type="submit" href="./edit-profile.php">Edit</a>
                        </form>
					</div>
				</div>
			</div>
		</div>
</body>
</html>