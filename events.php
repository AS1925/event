<?php session_start();
include("includes/db.php");
if(isset($_GET['search']))
    {
        $search=trim($_GET['search']);
        $query=mysqli_query($conn,"SELECT * FROM events WHERE event_name LIKE '%$search%' OR event_type LIKE '%$search%' ORDER BY event_date ASC");
    }
    else {
        $query=mysqli_query($conn,"SELECT * FROM events ORDER BY event_date ASC");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include("includes/header.html"); ?>

    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <h5 class="section-subtitle">DISCOVER EVENTS</h5>
                    <h1 class="page-title">Find your next celebration and reserve your spot instantly.</h1>
                    <p class="page-text">Browse upcoming events and register with a few clicks. The backend flow remains intact while the experience feels smooth and modern.</p>
                </div>
                <div class="col-lg-5">
                    <div class="page-card">
                        <form method="GET" class="d-flex gap-2 flex-wrap">
                            <input type="text" class="form-control" name="search" placeholder="Search event or type">
                            <button class="btn btn-warning" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <?php if(mysqli_num_rows($query)==0): ?>
                <div class="page-card text-center">
                    <h4>No Events Found</h4>
                    <p class="mb-0">Try another search term or come back soon for new experiences.</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php $count=1; while($row=mysqli_fetch_assoc($query)): 
                        $registered = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM registrations WHERE event_id='".$row['id']."'"));
                        $available = $row['max_participants'] - $registered['total'];
                    ?>
                    <div class="col-lg-4">
                        <div class="page-card h-100">
                            <?php if($row['image'] != ""): ?>
                                <img src="events/<?php echo $row['image']; ?>" class="img-fluid rounded-3 mb-3 event-thumb">
                            <?php else: ?>
                                <div class="empty-event-box mb-3"><i class="fas fa-images"></i></div>
                            <?php endif; ?>
                            <span class="badge bg-warning text-dark mb-2"><?php echo $row['event_type']; ?></span>
                            <h4><?php echo $row['event_name']; ?></h4>
                            <p class="text-muted"><?php echo $row['description']; ?></p>
                            <ul class="list-unstyled small text-muted">
                                <li><i class="fas fa-calendar text-primary me-2"></i><?php echo $row['event_date']; ?></li>
                                <li><i class="fas fa-clock text-primary me-2"></i><?php echo $row['event_time']; ?></li>
                                <li><i class="fas fa-location-dot text-primary me-2"></i><?php echo $row['venue']; ?></li>
                                <li><i class="fas fa-users text-primary me-2"></i><?php echo $available; ?> seats left</li>
                            </ul>
                            <?php if($available<=0): ?>
                                <button class="btn btn-secondary w-100 mt-3" disabled>Event Full</button>
                            <?php elseif(isset($_SESSION['user_id'])): ?>
                                <a class="btn btn-warning w-100 mt-3" href="register_event.php?id=<?php echo $row['id']; ?>">Register Now</a>
                            <?php else: ?>
                                <a class="btn btn-outline-primary w-100 mt-3" href="login.php">Login to Register</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include("includes/footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>