<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include("includes/header.html"); ?>

    <section class="page-hero">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h5 class="section-subtitle">CONTACT US</h5>
                    <h1 class="page-title">Let’s create something unforgettable together.</h1>
                    <p class="page-text">Share your plans with us and we’ll help you bring your vision to life with the right services and booking support.</p>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <div class="info-pill"><i class="fas fa-location-dot me-2"></i> Chennai, Tamil Nadu</div>
                        <div class="info-pill"><i class="fas fa-phone me-2"></i> +91 98765 43210</div>
                        <div class="info-pill"><i class="fas fa-envelope me-2"></i> support@eventease.com</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="page-card">
                        <h4 class="mb-3">Send a message</h4>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Your name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="your@email.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="4" placeholder="Tell us about your event"></textarea>
                            </div>
                            <button class="btn btn-warning">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("includes/footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>