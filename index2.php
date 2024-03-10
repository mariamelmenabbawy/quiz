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
<title>Authentication Form</title>

</head>
<body>
        <form action="register.php" method="POST" >
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Authentication Form</h2>  
        </div>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="username"><i class="fas fa-user"></i> Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">

        </div>
        <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">

        </div>
        <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">

        </div>
        <div class="form-group birthday">
            <label for="birthday"><i class="fas fa-calendar-alt"></i> Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : ''; ?>">

        </div>
        <button type="submit" name="submit" class="btn btn-primary" id="reg" >Register</button>
        <div id="or"><strong>OR</strong></div>
        <a href="index.php" class="btn btn-primary" id="log"> login</a>
    </div>
</form>




</body>
</html>