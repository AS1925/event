<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$registration_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM registrations WHERE user_id='$user_id'"));
$has_registered_event = $registration_data['total'] > 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <title>User Dashboard - Event Ease</title>
    </head>
    <body>
        <div class="container py-5">
            <div class="dashboard-hero">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1>Dashboard</h1>
                        <p class="page-text">Hello <?php echo htmlspecialchars($user_name); ?>, here is your event activity summary. Manage your profile, view registrations, and access decorator booking if you have a registered event.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="metric-card text-center">
                            <h3><?php echo $registration_data['total']; ?></h3>
                            <span>Registered Events</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-actions">
                <a href="profile.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-user"></i></div>
                    <h4>Profile Settings</h4>
                    <p>Update your contact details, email, and phone number in one place.</p>
                    <div class="card-footer">Manage account details</div>
                </a>
                <a href="my_events.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-calendar-check"></i></div>
                    <h4>My Events</h4>
                    <p>See all your event registrations, status, and cancel requests if needed.</p>
                    <div class="card-footer">View event history</div>
                </a>
                <?php if($has_registered_event): ?>
                    <a href="service_request.php" class="dashboard-card dashboard-link">
                        <div class="icon-circle"><i class="fas fa-sparkles"></i></div>
                        <h4>Book Decorators</h4>
                        <p>Reserve decorator services for your registered event and bring the venue to life.</p>
                        <div class="card-footer">Available now</div>
                    </a>
                <?php else: ?>
                    <div class="dashboard-card disabled-card">
                        <div class="icon-circle"><i class="fas fa-lock"></i></div>
                        <h4>Book Decorators</h4>
                        <p>This option unlocks after you register for an event. Join an event first to access decorator services.</p>
                        <div class="card-footer">Register for an event to unlock</div>
                    </div>
                <?php endif; ?>
                <a href="../logout.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-right-from-bracket"></i></div>
                    <h4>Logout</h4>
                    <p>Sign out securely from your account when you’re finished.</p>
                    <div class="card-footer">End session</div>
                </a>
            </div>

            <?php if(!$has_registered_event): ?>
                <div class="page-card mt-4">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h4 class="mb-2">No registered events yet?</h4>
                            <p class="mb-0">Register for an event to activate the decorator booking option and unlock premium event setup services.</p>
                        </div>
                        <div class="col-md-3 text-md-end mt-3 mt-md-0">
                            <a href="../events.php" class="btn btn-warning btn-lg">Browse Events</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>
