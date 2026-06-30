<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"
SELECT *
FROM users
WHERE id='$user_id'
");

$user = mysqli_fetch_assoc($result);

$msg = "";

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check=mysqli_query($conn," SELECT * FROM users WHERE email='$email' AND id!='$user_id'");
    if(mysqli_num_rows($check)>0)
        {
            $msg="Email Already Exists";
        }
    else{
    $update = mysqli_query($conn,"
    UPDATE users
    SET
    name='$name',
    email='$email',
    phone='$phone'
    WHERE id='$user_id'
    ");

    if($update)
    {
        $_SESSION['user_name'] = $name;

        $msg = "Profile Updated Successfully";

        $result = mysqli_query($conn,"
        SELECT *
        FROM users
        WHERE id='$user_id'
        ");

        $user = mysqli_fetch_assoc($result);
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>My Profile | EventEase</title>
</head>
<body>

<div class="container py-5">
    <div class="page-card mx-auto" style="max-width:760px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title">My Profile</h2>
                <p class="page-text">Update your personal details and keep your account information current.</p>
            </div>
            <div class="icon-circle"><i class="fas fa-user"></i></div>
        </div>

        <form method="POST" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" name="update" class="btn btn-warning">Update Profile</button>
                <a href="dashboard.php" class="btn btn-outline-secondary ms-2">Back to Dashboard</a>
            </div>
        </form>

        <?php if($msg): ?>
            <div class="alert alert-success mt-4"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/script.js"></script>
</body>
</html>
