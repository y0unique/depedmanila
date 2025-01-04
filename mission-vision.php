<?php 
    // include 'admin/headers/permission_policy_config.php';
    include 'admin/database/connection.php';
    include 'admin/database/code.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Mission Vision Core Values | Deped Manila</title>
        <meta name="viewport"    content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Department of Education Manila" />
        <meta name="keywords"    content="DepEd, Manila, Schools Division, Division of City Schools, Website of DepEd Manila, Official Website" />
        <meta name="author"      content="zeraphm"  />
        <!-- favicon -->
        <link rel="shortcut icon" href="admin/images/logo/favicon.ico">
        <!-- Magnific -->
        <link href="admin/css/home/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- css -->
        <link href="admin/css/home/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/css/home/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/css/home/style.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->        
        <link rel="stylesheet" href="admin/css/home/slick-theme.css"/>
        <link rel="stylesheet" href="admin/css/home/slick.css"/>
        <script>
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault();
            });
            document.addEventListener('keydown', function (e) {
                if (e.code === 'KeyU' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                }
            });
        </script>
    </head>

    <?php include 'admin/includes/home/preloader.php'; ?>
    <body>
        <!-- Navbar Start -->
        <?php 
            include 'admin/includes/home/navbar.php';
            echo '<script>document.getElementById("aboutus").classList.add("active");</script>';
        ?>
        <!-- Navbar End -->
        
        <!-- Mission Vision Start -->
        <section class="section" id="mision-vision">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-custom" href="index.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">About Us</li>
                        <li class="breadcrumb-item active" aria-current="page">Mission, Vision, Core Values, and Quality Objectives</li>
                    </ol>
                </nav>

                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <hr>
                            <h4 class="title text-uppercase mb-4">Mission & Vision</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="text-uppercase mb-4 pt-5">Mission</h5>
                                    <p class="text-dark mx-auto para-desc mb-0">
                                        
                                        To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:<br>
                                        Student learn in a child-friendly, gender-sensitive, safe and motivating environment<br>
                                        Teachers facilitate learning and constantly nurture every learner<br>
                                        Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen<br>
                                        Family, community and other stakeholders are actively engaged and share responsibility for developing lifelong learners<br>
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="text-uppercase mb-4 pt-5">Vision</h5>
                                    <p class="text-dark mx-auto para-desc mb-0">
                                        
                                        We dream of Filipinos<br>
                                        Who passionately love their country<br>
                                        and whose competencies and values<br>
                                        enable them to realize their full potential<br>
                                        and contribut meaningfully to building the nation.<br>
                                        We are a learner-centered public institution,<br>
                                        the Department of Education<br>
                                        continuously improves itself<br>
                                        to better serve its stakeholders.


                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="title text-uppercase mb-4 pt-5">Quality Objectives</h5>
                                    <p>"The Department of Education is committed to provide learners with quality basic education the is accessible, inclusive, and liberating through:</p>
                                    <ul class="text-left">
                                        <li>Proactive leadership</li>
                                        <li>Shared Governance</li>
                                        <li>Evidence-based policies, standards and programs</li>
                                        <li>Responsive and relevant curricula</li>
                                        <li>Highly competent and committed officials, and teaching and non-teaching personnel</li>
                                        <li>An enabling learning environment</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="title text-uppercase mb-4 pt-5">Core Values</h5>
                                    <p>
                                        Maka-Diyos<br>
                                        Maka-Tao<br>
                                        Makakalikasan<br>
                                        Makabansa<br>
                                    </p>
                                </div>
                            </div>

                            <hr>
                            <p>The Department upholds the highest standard of conduct and performance to fulfill stakeholders' needs and expectations by adhering to constitutional mandates, statutory, and regulatory requirements, and sustains client satisfaction through continuous improvement of Quality Management System."</p>

                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div><!--end container-->
        </section><!--end section-->
        <!-- Mission Vision End -->

        

        <!-- Seals Start -->
        <?php include 'admin/includes/home/seals.php'; ?>
        <!-- Seals End -->

        <!-- Footer Start -->
        <?php include 'admin/includes/home/footer.php'; ?>
        <!-- Footer End -->
        <!-- Scripts -->
        <?php include 'admin/includes/home/scripts.php'; ?>

                
    </body>

</html>