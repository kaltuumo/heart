<?php 
session_start();


?>
<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-2">
                    <h2 class="heading-section">Hrm System</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                        <form action="#" class="signin-form" method="post">
                            <div class="form-group">
                                <input type="text" name ="username" id ="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" id="password" type="password" class="form-control" placeholder="Password"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Log In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">


                                    <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>

	<?php 
	
	include('layout/conn.php');
	if(isset($_POST['login']))
	{

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        echo $username;
        echo "/", $password;

        $check_user = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");

        $rows = mysqli_fetch_array($check_user);
        $res = mysqli_num_rows($check_user);
        // $result = $check_user >num_rows();
        // echo $result;

        if($res > 0){
            $_SESSION['user_id'] = $rows[0];
            $_SESSION['fullname'] = $rows[1];
            $_SESSION['username'] = $rows[2];
            $_SESSION['password'] = $rows[3];
            $_SESSION['role'] = $rows[4];
            $_SESSION['user_photo'] = $rows[5];

            echo '<script>alert("Log in Successfully");</script>';
            echo '<script>window.location.href="home.php";</script>';
        }else{
            echo '<script>alert("Invalid Username or Password Please Try Again")</script>';
            echo '<script>window.location.href="index.php";</script>';
        }
        // echo $res;
        // echo $rows[2];

		// echo "<script>window.location.href='home.php'</script>";
	}
	
	?>

</body>

</html>