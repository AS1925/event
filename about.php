<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | EventEase</title>
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
                    <h5 class="section-subtitle">ABOUT EVENTEASE</h5>
                    <h1 class="page-title">We turn every celebration into a beautifully planned experience.</h1>
                    <p class="page-text">Our platform keeps event booking simple, stylish, and stress-free. From discovery to registration and service requests, everything is designed to feel effortless.</p>
                    <a href="events.php" class="btn btn-warning btn-lg mt-3">Explore Events</a>
                </div>
                <div class="col-lg-5">
                    <div class="page-card">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-stars fa-2x me-3 text-warning"></i>
                            <div>
                                <h4 class="mb-0">Why we stand out</h4>
                                <p class="mb-0 text-muted">Trusted planning in one digital space.</p>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Fast and friendly booking flow</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Secure user accounts and registrations</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i> Professional service support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-calendar-check fa-2x text-primary mb-3"></i>
                        <h4>Smart Booking</h4>
                        <p class="mb-0">Browse, book, and manage events with a modern experience tailored to your schedule.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-user-shield fa-2x text-primary mb-3"></i>
                        <h4>Secure Access</h4>
                        <p class="mb-0">Every account stays protected while users enjoy a simple dashboard and personalized navigation.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-headset fa-2x text-primary mb-3"></i>
                        <h4>Helpful Support</h4>
                        <p class="mb-0">Our team helps ensure requests, registrations, and services are handled smoothly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("includes/footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>