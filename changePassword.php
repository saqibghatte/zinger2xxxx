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
    if(!isLoggedIn())
    {
          header("Location:index.php");
    }
    
    if(isset($_POST['submit']))
    {
        $contactNumber = $_SESSION['uid'];
        $table = $_SESSION['utype'];

        $currentPass = Encrypt(secure($_POST['currentPass']));
        $newPass = secure($_POST['newPass']);
        $confirmPass = secure($_POST['confirmPass']);
        
        if($table=="members_list") { $contactCName = "contact_no"; $passwordCName = "member_password"; $NameCName = "FullName"; $emailCName = "emailId"; }
        if($table=="nonapstm"||$table=="othermember") { $contactCName = "mobileno"; $passwordCName = "password"; $NameCName = "name"; $emailCName = "email"; }
            
        if($newPass==$confirmPass)
        {
            $cipher = Encrypt($newPass);
            $sql = "SELECT * FROM `$table` WHERE `$contactCName`= '$contactNumber' AND `$passwordCName`='$currentPass'";
            $result = $mysqli->query($sql);
            if($row = $result->fetch_assoc())
            {
                $sql = "UPDATE `$table` SET `$passwordCName`='$cipher' WHERE `$contactCName`= '$contactNumber'";
                if($pass_result = $mysqli->query($sql))
                {
                    session_destroy();
                    header("Location:login.php?passchange");
                    exit();
                }
            }
        }
        else
        {
            header("Location:changePassword.php?incorrectPass");
            exit();
        }
    }
    ?>
    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>Change Password</h1>
        </div>
    </section>
	<br>
	<form id="resetform" name="resetform" method="post">
         <div class="container clearfix">
           <?php
            if (isset($_GET['incorrectPass'])) {
                echo "<div><b>Sorry! Current Password is incorrect</b></div>";
            }
            ?>
            <div class="w50">
                <div class="item">
                    <input type="password" name="currentPass"  placeholder="Enter Current Password" required>
                </div>
            </div>
            <br>
            <div class="w50">
                <div class="item">
                    <input type="password" name="newPass"  placeholder="Enter New Password" required>
                </div>
            </div>
            <br>
            <div class="w50">
                <div class="item">
                    <input type="password" name="confirmPass"  placeholder="Re-Type Password" required>
                </div>
            </div>

            <br>
            <div class="w50">
                <div class="item">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </div>
	</form>

</body>

</html>