<!doctype html>
<html>

<head>
    <?php require("includes/config.php"); ?>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akhil Padmashali Samaj Trust (Mumbai)</title>
    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awsome.css">
    <link type="text/css" rel="stylesheet" href="css/featherlight.min.css" />
    <link type="text/css" rel="stylesheet" href="css/featherlight.gallery.min.css" />
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <?php require("includes/header.php"); ?>
    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>Upcoming Events</h1>
        </div>
    </section>
    <section class="clearfix innerData">
        <div class="container members">
            <div class="row">
               <?php
                $sql="SELECT * FROM `events`";
                if($result = $mysqli->query($sql))
                {
                while ($row = $result->fetch_assoc())
                { ?>
                <div class="col-lg-2">
                    <a class="thumbnail gallery" href="img/events/<?php echo $row['image']; ?>"><img src="img/events/<?php echo $row['image']; ?>" width="150" height="150"/></a>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <script src="js/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function () {
            $('.gallery').featherlightGallery({
                gallery: {
                    fadeIn: 300
                    , fadeOut: 300
                }
                , openSpeed: 300
                , closeSpeed: 300
            });
        });
    </script>
    <?php require("includes/footer.php"); ?>
</body>

</html>