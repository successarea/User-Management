
<?php
    session_start();

    include('dbconnection.php');
    if(!isset($_SESSION['user_array'])) {
        header('location: login.php');
    } else {
        if($_SESSION['user_array']['role'] != "user"){
            header('location:admin-dashboard.php');
        }
    }
    
    //User Edit
    $user_edition_status = false;
    if(isset($_REQUEST['user_id_to_edit'])){
        $user_id_to_edit = $_REQUEST['user_id_to_edit'];
            $user_edition_status = true;
            $query = "SELECT * FROM users WHERE id = $user_id_to_edit";
            $result = mysqli_query($dbconnect, $query);
            if($result){
                $user = mysqli_fetch_assoc($result);
            }else{
                die('Error: '. mysqli_error($dbconnect));
            }
    }

    //Authentication Code
    $auth_user_id = $_SESSION['user_array']['id'];
    $auth_user_result = mysqli_query($dbconnect, "SELECT * FROM users WHERE id = $auth_user_id");
    if($auth_user_result){
        $auth_user_array = mysqli_fetch_array($auth_user_result);
    } else {
        die("Error: ". mysqli_error($dbconnect));
    }
    //User Update
    if(isset($_POST['update_button'])){
        $user_id = $_POST['user_id'];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
           

            $user_result = mysqli_query($dbconnect, "SELECT * FROM users WHERE id = $user_id");
            $user_array = mysqli_fetch_assoc($user_result);

            $old_password = $user_array['password'];
            $input_password = $_POST['password'];
            $new_password = $old_password != $input_password ? md5($input_password) : $input_password;

            $query = "UPDATE `users` SET `name`='$name',`email`='$email',`address`='$address',`password`='$new_password' WHERE id = $user_id";
            
            $result = mysqli_query($dbconnect, $query);
            if($result){
                // echo "<script>alert('A User Updated Successfully')</script>";
                header('location: user-dashboard.php');
            } else {
                die('Error: ' . mysqli_error($dbconnect));
            }
    }
    echo "<script>Swal.fire('Good job!', 'You clicked the button!', 'success')</script>;";
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
        
        
     </style>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-title">
                                
                                <h5>
                                    User Dashboard
                                </h5>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <form action="logout.php" method="GET">
                                    <button class="float-end btn btn-primary" type="submit" name="LogoutButton" 
                                    onclick="return confirm('Are you sure to logout your account?');">Logout</button>
                                </form>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-body">
                    
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Admin Info</h6>
                                        <div>Role : 
                                            <span class="badge bg-success"> <?= $auth_user_array['role']?></span>
                                        </div>
                                        <div>Name : <?= $auth_user_array['name']?></div>
                                        <div>Email : <?= $auth_user_array['email']?></div>
                                        <div>Address : <?= $auth_user_array['address']?></div>
                                        <div>Password : <?= $auth_user_array['password']?></div>
                                        <a href="user-dashboard.php?user_id_to_edit=<?= $auth_user_array['id']?>" class="btn btn-success btn-sm">Edit Your Profile</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <?php if($user_edition_status == true) : ?>
                                <div class="card mt-3">
                                    <div class="card-header bg-success">
                                        <div class="card-heading">Edit Form</div>
                                    </div>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <div class="card-body">
                                            <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" 
                                            value="<?= $user['name']?>">
                                            </div>

                                            <div class="form-group mt-2">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" 
                                            value="<?= $user['email']?>">
                                            </div>

                                            <div class="form-group mt-2">
                                            <label for="">Address</label>
                                            <textarea class="form-control" name="address"><?= $user['address']?></textarea>
                                            </div>

                                            <div class="form-group mt-2">
                                            <label for="">Password</label>
                                            <input type="text" class="form-control" name="password" 
                                            value="<?= $user['password']?>">
                                            </div>

                                            
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary btn-sm" name="update_button">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <?php endif ?>                    
                            </div>
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