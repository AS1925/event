<?php session_start(); 
include("includes/db.php");
$message="";
if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($query)>0){
            $user=mysqli_fetch_assoc($query);
            if(password_verify($password,$user['password']))
                {
                    $_SESSION['user_id']=$user['id'];
                    $_SESSION['user_name']=$user['name'];
                    $_SESSION['role']=$user['role'];
                   if($user['role']=='admin')
                    {
                        header("Location:admin/dashboard.php");
                    }
                    else{
                        header("Location:user/dashboard.php");
                    }
                    exit();
                }
                else
                    {
                        $message="Incorrect Password!";
                    }
        }
        else
            {
                $message="Email not found!";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include("includes/header.html"); ?>
    <section class="page-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="page-card">
                        <h3 class="mb-3">Welcome back</h3>
                        <p class="text-muted">Continue planning your next event.</p>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-warning w-100">Login</button>
                        </form>
                        <?php if($message != ""): ?>
                            <div class="alert alert-danger mt-3 mb-0"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="register.php"><i class="fas fa-user-plus me-1"></i>Create account</a>
                            <a href="forgot_password.php"><i class="fas fa-key me-1"></i>Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>