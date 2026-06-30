<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | EventEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include("includes/header.html"); ?>

    <section class="page-hero">
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="section-subtitle">OUR SERVICES</h5>
                <h1 class="page-title">Everything you need for a magical celebration.</h1>
                <p class="page-text">Book high-quality services with confidence and let EventEase bring your event vision to life.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-ring fa-2x text-primary mb-3"></i>
                        <h4>Wedding Planning</h4>
                        <p class="mb-0">Elegant décor, stage design, photography, and hospitality planning tailored to your big day.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-birthday-cake fa-2x text-primary mb-3"></i>
                        <h4>Birthday Styling</h4>
                        <p class="mb-0">Colorful decor, cakes, entertainment, and celebration setup for every age and theme.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-camera fa-2x text-primary mb-3"></i>
                        <h4>Photography</h4>
                        <p class="mb-0">Professional photography packages that capture every memory in detail and style.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-utensils fa-2x text-primary mb-3"></i>
                        <h4>Catering</h4>
                        <p class="mb-0">Delicious food and beverage services designed to suit your event size and menu preferences.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-music fa-2x text-primary mb-3"></i>
                        <h4>DJ & Sound</h4>
                        <p class="mb-0">Professional DJ, music, and sound setup to keep the energy alive throughout your event.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-card h-100">
                        <i class="fas fa-lightbulb fa-2x text-primary mb-3"></i>
                        <h4>Lighting & Stage</h4>
                        <p class="mb-0">Creative lighting and stage solutions that make your event feel polished and premium.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("includes/footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
