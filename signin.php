<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hard Coat Test Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<main class="form-signin w-250 m-auto">
    <div class="card card-info" align="center">
        <form action="signin_db.php" method="post">
            <h1>

            </h1>
             <img class="mt-4" src="img/1234.png" alt="" width="230" height="230">
             <h3 class="mt-4">เข้าสู่ระบบ</h3>
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <label for="email" class="form-label" >Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>  
<h4></h4>
            <button type="submit" name="signin" class="btn btn-primary"align="center">Sign In</button>
        </form>
        <hr>
    </div>
</main>    
</body>
</html>