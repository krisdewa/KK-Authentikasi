<?php   
    session_start();
    include('function.php');
    login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <title>Document</title>
</head>
<body>
    <br><br><br>
    <center>
    <p> User : <?php echo $_SESSION['username']; ?> </p> 
    <p> Selamat anda berhasil login</p>
    <a class="btn btn-danger" aria-current="page" href="auth-logout.php" onclick="return confirm('Yakin ingin logout ?')">LOGOUT</a>
    </center>
</body>
</html>