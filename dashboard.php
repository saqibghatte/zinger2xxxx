<!doctype html>
<html>

<head>
    <?php require("includes/config.php"); ?>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akhil Padmashali Samaj Trust (Mumbai)</title>
    <!-- Styles -->
    
    <link  rel="stylesheet" href="css/dashboardcss.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awsome.css">
	<script src="js/mainUrl.js"></script> 
	 <script type="text/JavaScript" src="js/jquery.js"></script>
   
    <script src="js/jquery.js"></script>
	<script src="js/script.js"></script> 
	<script src="js/jquery.min.js"></script> 
	<script src="js/jquery.validate.js"></script>
</head>

<body>
    <?php require("includes/header.php"); ?>

    <div class="containerdash">
        <div class="dashtxt">
            <h1>Dashboard</h1>
            <ul class="logiExtra clearfix">
                <li class="animated bounceIn">
                    <a href="myprofile.php">
                        <div class="item">
                            <img src="images/profileicon.png">
                        </div>
                    </a>
                </li>
                <li class="animated bounceIn">
                    <a href="familymember.php">
                        <div class="item">
                            <img src="images/addpeopleicon.png">


                        </div>
                    </a>
                </li>
                <li class="animated bounceIn">
                    <a href="vadhuVarulaForm.php">
                        <div class="item">
                            <img src="images/vadhuvaricon.png">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
        <?php require("includes/footer.php"); ?>
</body>

</html>