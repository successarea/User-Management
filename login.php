<?php
    session_start();
    include ('dbconnection.php');
    $error = "";
    if(isset($_POST['loginButton'])) {
       $email = trim($_POST['email']);
       $password = md5(trim($_POST['password']));

       $user_result = mysqli_query($dbconnect, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

       $user_count = mysqli_num_rows($user_result);

       if($user_count === 1){
            $user_array = mysqli_fetch_assoc($user_result);
            
            $_SESSION['user_array'] = $user_array;

            if($user_array['role'] == "admin"){
                header('location:admin-dashboard.php');
            } else {
                header('location:user-dashboard.php');
            }
       } else {
            $error = "Invalid Email or Password";
       }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

     <style type="text/css">
        body{
            padding:50px;
        }
        
        .TextD{
            text-decoration:none;
            color:red;
        }
     </style>
</head>
<body>

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-title">
                                <h5>
                                   Login Form
                                </h5>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <a href="index.php"><button class="float-end btn btn-primary"><< Back</button></a>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-body">
                    <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                        <div class="card">
                                    
                                            <div class="card-header bg-success">
                                         <div class="card-title">Login</div>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="card-body">

                                            <?php if($error != ""): ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong><?php echo $error; ?></strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php endif ?>
                                                                        
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" name="email">

                                                    <label for="">Password</label>
                                                    <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="card-footer bg-success">
                                                <button class="btn btn-primary" type="submit" name="loginButton">Login</button>
                                                <span>if you don't have an account,
                                                <a href="register.php" class="TextD">register here.</a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>