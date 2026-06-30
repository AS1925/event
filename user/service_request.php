<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

$msg="";

if(isset($_POST['submit']))
{
    $user_id=$_SESSION['user_id'];

    $event_type=mysqli_real_escape_string($conn, $_POST['event_type']);
    $event_date=mysqli_real_escape_string($conn, $_POST['event_date']);
    $venue=mysqli_real_escape_string($conn, $_POST['venue']);
    $guests=mysqli_real_escape_string($conn, $_POST['guests']);
    $decorator_package=mysqli_real_escape_string($conn, $_POST['decorator_package']);
    $decor_style=mysqli_real_escape_string($conn, $_POST['decor_style']);
    $budget=mysqli_real_escape_string($conn, $_POST['budget']);
    $additional_requirements=mysqli_real_escape_string($conn, $_POST['additional_requirements']);

    $summary = "Decorator Package: {$decorator_package}; Style: {$decor_style}; Budget: {$budget}; Notes: {$additional_requirements}";

    $query=mysqli_query($conn, "
    INSERT INTO service_requests
    (
    user_id,
    event_type,
    event_date,
    venue,
    guests,
    decoration,
    photography,
    catering,
    dj,
    additional_requirements
    )
    VALUES
    (
    '$user_id',
    '$event_type',
    '$event_date',
    '$venue',
    '$guests',
    'Yes',
    'No',
    'No',
    'No',
    '$summary'
    )
    ");

    if($query)
    {
        $msg="Decorator booking request submitted successfully.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decorator Booking | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-card">
                    <h2 class="page-title">Book a Decorator</h2>
                    <p class="page-subtitle">Reserve a decorator package for your wedding, birthday, reception, or corporate celebration.</p>

                    <form method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Event Type</label>
                            <select class="form-select" name="event_type" required>
                                <option>Wedding</option>
                                <option>Birthday</option>
                                <option>Reception</option>
                                <option>Corporate</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Event Date</label>
                            <input type="date" class="form-control" name="event_date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Venue</label>
                            <input type="text" class="form-control" name="venue" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Number of Guests</label>
                            <input type="number" class="form-control" name="guests" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Decorator Package</label>
                            <select class="form-select" name="decorator_package" required>
                                <option>Basic Decor</option>
                                <option>Premium Decor</option>
                                <option>Luxury Decor</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Decor Style</label>
                            <select class="form-select" name="decor_style" required>
                                <option>Classic</option>
                                <option>Modern</option>
                                <option>Floral</option>
                                <option>Theme-based</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Approximate Budget</label>
                            <input type="text" class="form-control" name="budget" placeholder="e.g. 30000 INR" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Additional Requirements</label>
                            <textarea class="form-control" rows="4" name="additional_requirements" placeholder="Tell us about flowers, lighting, stage setup, color theme, etc."></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-warning">Submit Booking Request</button>
                            <a href="dashboard.php" class="btn btn-outline-secondary ms-2">Back to Dashboard</a>
                        </div>
                    </form>

                    <?php if($msg != ""): ?>
                        <div class="alert alert-success mt-4 mb-0"><?php echo $msg; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>