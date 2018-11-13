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
    
    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    if(isset($_POST['submit']))
    {
        $contactNumber = secure($_POST['contactNumber']);
        
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
            $password = generateRandomString();
            $cipher = Encrypt($password);
            if($table=="members_list") { $contactCName = "contact_no"; $passwordCName = "member_password"; $NameCName = "FullName"; $emailCName = "emailId"; }
            if($table=="nonapstm"||$table=="othermember") { $contactCName = "mobileno"; $passwordCName = "password"; $NameCName = "name"; $emailCName = "email"; }
            
            $sql = "UPDATE `$table` SET `$passwordCName`='$cipher' WHERE `$contactCName`= '$contactNumber'";
            $pass_result = $mysqli->query($sql);
            
            $sql = "SELECT * FROM `$table` WHERE `$contactCName`= '$contactNumber'";
            $pass_result = $mysqli->query($sql);
            if($pass_row = $pass_result->fetch_assoc())
            {
                $to = $pass_row["$emailCName"];
                $subject = "Password Re-generated for akhilpadmashalisamaj.com Account";
                
                $headers = "From: " . strip_tags("noreply@akhilpadmashalisamaj.com") . "\r\n";
                $headers .= "Reply-To: ". strip_tags("noreply@akhilpadmashalisamaj.com") . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
                $msg = "Dear " . $pass_row["$NameCName"] . ",<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Password has been re-generated by Administrator of Akhil Padmashali Samaj Trust (Mumbai). Please login using the below credentials.<br><br><b>Contact Number:</b> $contactNumber<br><b>Password:</b> $password<br><br>Kindly change your password after login.";
                mail($to,$subject,$msg,$headers);
                echo "Mail Sent Successfully! Password: $password";
                //header("Location:resetpass.php?sent");
            }
        }
        else
        {
            header("Location:resetpass.php?noexists");
            exit();
        }
    }
    ?>
    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>Reset Password</h1>
        </div>
    </section>
	<br>
	<form id="resetform" name="resetform" method="post">
         <div class="container clearfix">
           <?php
            if (isset($_GET['noexists'])) {
                echo "<div><b>Sorry! Account does not found</b></div>";
            }
            if (isset($_GET['sent'])) {
                echo "<div><b>Password Reset! Mail Sent to your registered Email ID!</b></div>";
            }
            ?>
            <div class="w50">
                <div class="item">
                    <input type="text" name="contactNumber"  placeholder="Enter Mobile No." required>
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