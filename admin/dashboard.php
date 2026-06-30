<?php 
session_start();
include('../includes/db.php');
if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}
if($_SESSION['role']!='admin')
{
    die("Access Denied");
}
$total_users = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM users"));

$total_events = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM events")
);

$total_registrations = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM registrations")
);

$total_requests = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM service_requests")
);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <title>Admin Dashboard - EventEase</title>
    </head>
    <body>
        <div class="container py-5">
            <div class="dashboard-hero mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1>Admin Dashboard</h1>
                        <p class="page-text">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>. Monitor registrations, manage events, and review service requests from a clean admin space.</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-4 mt-md-0">
                        <a href="../logout.php" class="btn btn-outline-secondary btn-lg" onclick="return confirm('Are you sure want to logout?')">Logout</a>
                    </div>
                </div>
            </div>

            <div class="dashboard-actions mb-4">
                <a href="add_event.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-plus"></i></div>
                    <h4>Add Event</h4>
                    <p>Create new events for users to register and participate in.</p>
                    <div class="card-footer">Create your next event</div>
                </a>
                <a href="view_events.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-calendar-check"></i></div>
                    <h4>Manage Events</h4>
                    <p>Edit event details, update availability, and archive outdated events.</p>
                    <div class="card-footer">Manage event listings</div>
                </a>
                <a href="view_registrations.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-users"></i></div>
                    <h4>Registrations</h4>
                    <p>Review registration records and follow up on participant status.</p>
                    <div class="card-footer">View attendee details</div>
                </a>
                <a href="view_service_requests.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-clipboard-list"></i></div>
                    <h4>Service Requests</h4>
                    <p>Approve and manage decorator and service booking requests from users.</p>
                    <div class="card-footer">Respond to requests</div>
                </a>
                <a href="reports.php" class="dashboard-card dashboard-link">
                    <div class="icon-circle"><i class="fas fa-chart-line"></i></div>
                    <h4>Reports</h4>
                    <p>Track registrations, service demand, and engagement across the platform.</p>
                    <div class="card-footer">View analytics</div>
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="metric-card text-center">
                        <h3><?php echo $total_users['total']; ?></h3>
                        <span>Total Users</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card text-center">
                        <h3><?php echo $total_events['total']; ?></h3>
                        <span>Total Events</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card text-center">
                        <h3><?php echo $total_registrations['total']; ?></h3>
                        <span>Total Registrations</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card text-center">
                        <h3><?php echo $total_requests['total']; ?></h3>
                        <span>Service Requests</span>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>
