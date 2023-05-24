<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
<title>Logout</title>

</head>

<body>


     <?php include('layout/conn.php');
     session_destroy();
     echo '<script>window.location.href="index.php";</script>';
     ?>
	


</body>

</html>