

<?php

include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<title>Login</title>

</head>
<body>
<form action="login.php" method="POST" >
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Login</h2>
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
        <button type="submit" name ="submit" id="log" class="btn btn-primary" >Login</button>
        <div id="or"><strong>OR</strong></div>
        <a href="index2.php" class="btn btn-primary" id="reg"> Register</a>
    </div>

</form>


</body>
</html>
