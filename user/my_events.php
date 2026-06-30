<?php session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_id']))
{
    header("Location:../login.php");
    exit();
}
$user_id=$_SESSION['user_id'];
$query=mysqli_query($conn,"SELECT registrations.id AS reg_id, events.event_name,events.event_type,events.event_date,events.venue,registrations.status FROM registrations INNER JOIN events ON registrations.event_id=events.id WHERE registrations.user_id='$user_id'");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <title>My Events | EventEase</title>
    </head>
    <body>
        <div class="container py-5">
            <div class="page-card mb-4">
                <h2 class="page-title">My Registered Events</h2>
                <p class="page-text">Review the events you've joined and manage registrations with ease.</p>
            </div>
            <?php if(mysqli_num_rows($query) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=1;
                            while($row=mysqli_fetch_assoc($query)):
                            ?>
                            <tr>
                                <td><?php echo $count++;?></td>
                                <td><?php echo htmlspecialchars($row['event_name']);?></td>
                                <td><?php echo htmlspecialchars($row['event_type']);?></td>
                                <td><?php echo htmlspecialchars($row['event_date']);?></td>
                                <td><?php echo htmlspecialchars($row['venue']);?></td>
                                <td><?php echo htmlspecialchars($row['status']);?></td>
                                <td>
                                    <a href="cancel_registration.php?id=<?php echo $row['reg_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Cancel Registration?')">Cancel</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="page-card text-center">
                    <h4>No registered events yet.</h4>
                    <p>Visit the event listing to join an event and unlock decorator booking.</p>
                    <a href="../events.php" class="btn btn-warning mt-3">Browse Events</a>
                </div>
            <?php endif; ?>
            <div class="mt-4">
                <a href="dashboard.php" class="btn btn-outline-secondary">Back to Dashboard</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>