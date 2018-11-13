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
    if(isLoggedIn())
    {
          header("Location:index.php");
    }
    if (isset($_POST['login']))
    {
        $contactNumber = secure($_POST['contactNumber']);
        $password = secure($_POST['password']);

        // --- 1. Checking Members Type --- //
        $table = "";
        $sql = "SELECT * FROM `members_list` WHERE `contact_no`='$contactNumber'";
        $result = $mysqli->query($sql);
        if($result->num_rows>0)
        {
            $table = "members_list";
        }
        
        $sql = "SELECT * FROM `nonapstm` WHERE `mobileno`='$contactNumber'";
        $result = $mysqli->query($sql);
        if($result->num_rows>0)
        {
            $table = "nonapstm";
        }
        
        $sql = "SELECT * FROM `othermember` WHERE `mobileno`='$contactNumber'";
        $result = $mysqli->query($sql);
        if($result->num_rows>0)
        {
            $table = "othermember";
        }
        
        if($table!="")
        {
            $password = Encrypt($password);
            $contactCName = "";
            if($table=="members_list") { $contactCName = "contact_no"; $passwordCName = "member_password"; $NameCName = "FullName"; }
            if($table=="nonapstm"||$table=="othermember") { $contactCName = "mobileno"; $passwordCName = "password"; $NameCName = "name"; }
            
            $sql = "SELECT * FROM `$table` WHERE `$contactCName`= '$contactNumber' AND `$passwordCName`='$password'";
            $pass_result = $mysqli->query($sql);
            if($pass_row = $pass_result->fetch_assoc())
            {
                $_SESSION['uid'] = $contactNumber;
                $_SESSION['utype'] = $table;
                $_SESSION['name'] = $pass_row["$NameCName"];
                header("Location:index.php");
                exit();
            }
            else
            {
                header("Location:login.php?wrongpass");
                exit();
            }
        }   
        else
        {
            header("Location:login.php?noexists");
            exit();
        }
    }
    ?>
    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>Login</h1>

        </div>
    </section>
    <br>
    <form id="loginform" name="loginform" method="post">
        <div class="container clearfix">
               <?php
                if (isset($_GET['wrongpass'])) {
                    echo "<div><b>Password is Incorrect</b></div>";
                }
                if (isset($_GET['noexists'])) {
                    echo "<div><b>Sorry! Account does not found</b></div>";
                }
                if (isset($_GET['logout'])) {
                    echo "<div><b>Logged Out Successfully!</b></div>";
                }
                if (isset($_GET['passchange'])) {
                    echo "<div><b>Password Changed! Please login back to continue!</b></div>";
                }
                ?>
                <br>
            <div class="w50">
                <div class="item">
                    <input type="text" name="contactNumber" placeholder="Email Mobile No.">
                </div>
            </div>
            <br>
            <div class="w50">
                <div class="item">
                    <input type="password" name="password" placeholder="Password">
                </div>
            </div>
            <br>
            <div class="w50">
                <div class="item">
                    <label><a href="resetpass.php">Forgot Password?</a></label>
                </div>
            </div>
            <br>
            <div class="w50">
                <div class="item">
                    <input type="submit" name="login" value="Submit">
                </div>
            </div>
        </div>
    </form>

</body>

</html>