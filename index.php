<?php
    include("dbconnection.php");
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
                                    Home Page
                                </h5>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <a href="register.php"><button class="float-end btn btn-primary">Register</button></a>
                                <a href="login.php"><button class="float-end btn btn-primary me-3">Login</button></a>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-body">
                        <h5>About Our Website</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus harum quod tenetur. Unde totam tenetur temporibus fuga ad repudiandae exercitationem, dicta voluptate reprehenderit dolores. Distinctio similique laudantium voluptatibus</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et quisquam officia, maxime consequuntur reprehenderit labore ut officiis error atque nostrum voluptatibus placeat tempore ratione inventore quos aspernatur facilis cum. In?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>