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
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    
    <?php require("includes/header.php"); 
    if(isset($_GET['apstm']))
    {
        $page = "apstmMember.php";
    }
    elseif(isset($_GET['nonapstm']))
    {
        $page = "nonapstm.php";
    }
    elseif(isset($_GET['others']))
    {
        $page = "others.php";
    }
    else
    {
        echo "<script>window.location.assign('index.php');</script>";
    }    
    ?>
    
    <div style="text-align:center;margin-top:30vh;margin-bottom:30vh;">
        <h1>Thank You</h1>
        <h1>Registration is Successfull, you will be notified by SMS/Email</h1>
        <h1>Your account will be operative within 48 hours.</h1>
    </div>
    
    <?php require("includes/footer.php"); ?>
    
    <script>
        setTimeout(myFunction, 4000);
        
        function myFunction() {
            window.location.assign("<?php echo $page; ?>");
        }
    </script>
</body>

</html>