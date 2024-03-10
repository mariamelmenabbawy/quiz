<?php
include '../server.php' ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<title>Admin Login</title>

</head>
<body>
<form action="" method="POST" >
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Login For Admin</h2>
            <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <label for="username"><i class="fas fa-user"></i> Username:</label>
            <input type="text" class="form-control" id="username" name="username">
             
        </div>
        <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($pass)) {echo $pass;} ?>" >
           
        </div>
        <button  name ="submit1"  class="btn btn-primary" >Login</button>
                </form>
                </body>
                </html>
                <?php
          
                if(isset($_POST["submit1"]))
                {
                    $rows=0;
                   
                    $username=mysqli_real_escape_string($connect,$_POST['username']);
                    $password=mysqli_real_escape_string($connect,$_POST['password']);
                    $result=mysqli_query($connect,"SELECT * FROM admin WHERE username='$username' AND password='$password' ");
                    $rows=mysqli_num_rows($result);
                    if($rows == 0){
                      ?>  <div class="alert alert-danger" role="alert">
                     Invalid Username Or Password 
                      </div> <?php
                    }
                    else{

                         header('Location: ../Q.php');
                    }
                }
            
                
                ?>