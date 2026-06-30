<?php session_start();
include('includes/db.php');
$message="";
if(isset($_POST['register']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);
        $check=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($check)>0)
            {
                $message="Email already registered";
            }
        else{
            $query="INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$hashed_password')";
            if(mysqli_query($conn,$query))
                {
                    $message="Registration Successful!";
                }
            else{
                $message="Registartion Failed!";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include("includes/header.html"); ?>
    <section class="page-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="page-card">
                        <h3 class="mb-3">Create your account</h3>
                        <p class="text-muted">Start booking events and managing service requests in seconds.</p>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Full name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-warning w-100">Register</button>
                        </form>
                        <?php if($message != ""): ?>
                            <div class="alert alert-info mt-3 mb-0"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <div class="mt-3 text-center">
                            <a href="login.php"><i class="fas fa-right-to-bracket me-1"></i>Already have an account? Login</a>
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