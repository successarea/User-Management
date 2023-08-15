<?php
    include ("dbconnection.php");
    
    $nameError = "";
    $emailError = "";
    $addressError = "";
    $passwordError = "";
    $confirmpasswordError = "";

    $name = "";
    $email = "";
    $address = "";
    $password = "";
    $confirm_password = "";


    if(isset($_POST['register_button'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if(empty($name)) {
            $nameError = "The name field is required";
        }

        if(empty($email)) {
            $emailError = "The email field is required";
        }

        if(empty($address)) {
            $addressError = "The address field is required";
        }

        if(empty($password)) {
            $passwordError = "The password field is required";
        }

        if(empty($confirm_password)) {
            $confirmpasswordError = "The confirm_password  field is required";
        }
        
        if($confirm_password != $password) {
            $confirmpasswordError = "The password does not match";
        }

        if(!empty($name) && !empty($email) && !empty($address) && !empty($password) && !empty($confirm_password) && !($confirm_password != $password)) {

            $encrptPassword = md5($password);
            $query = "INSERT INTO `users`(`id`, `name`, `email`, `address`, `password`) VALUES ('NULL','$name','$email','$address','$encrptPassword')";

            $result = mysqli_query($dbconnect, $query);

            if($result) {
                echo "<script>alert('Registration Successful');</script>";
                header('location:login.php');
            } else {
                die('error: ' . mysqli_error($query));
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
                                    Registration Form
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
                                         <div class="card-title">Register</div>
                                        </div>

                                        <form action="" method="POST">
                                        <div class="card-body">
                                            <div class="form-group"> 
                                                <label for="">Name</label>
                                            
                                                <input type="text" name="name" class="form-control 
                                                <?php if($nameError != "") {?> is-invalid <?php } ?>" value="<?php echo $name;?>">
                                                <i class="text-danger" >
                                                    <?= $nameError ?>
                                                </i>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control 
                                                <?php if($emailError != "") {?> is-invalid <?php } ?>" value="<?php echo $email; ?>">
                                                <i class="text-danger">
                                                    <?= $emailError ?>
                                                </i>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <textarea rows="3" name="address" class="form-control <?php if($addressError != "") { ?> is-invalid <?php } ?>"><?php echo $address; ?></textarea>
                                                <i class="text-danger">
                                                    <?= $addressError ?>
                                                </i>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control 
                                                <?php if($passwordError != "") {?> is-invalid <?php } ?>" value="<?= $password ?>">
                                                <i class="text-danger">
                                                    <?= $passwordError ?>
                                                </i>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control 
                                                <?php if($confirmpasswordError != "") {?> is-invalid <?php } ?>" value="<?= $confirm_password ?>">
                                                <i class="text-danger">
                                                    <?= $confirmpasswordError ?>
                                                </i>
                                            </div>
                                        </div>
                                            <div class="card-footer bg-success">
                                                <button type="submit" name="register_button" class="btn btn-primary">Register</button>
                                                <span>if you already have an account,
                                                    <a href="login.php" class="TextD">login here.</a>
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