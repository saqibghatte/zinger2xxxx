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
    <script src="js/mainUrl.js"></script>
    <script language="Javascript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src='js/state.js'></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 10px;
        }

        .tdalign {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 10px;
            text-align: left;
        }
    </style>
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

        $profession = secure($_POST['Professional']);
        $email = secure($_POST['email']);
        $address = secure($_POST['address']);
        $state = secure($_POST['state']);
        $city = secure($_POST['city']);
        
        if($table=="members_list")
        {
            $sql = "UPDATE `$table` SET `address`='$address',`emailId`='$email',`Professional`='$profession',`city`='$city',`state`='$state' WHERE `contact_no` = '$contactNumber';";
        }
        if($table=="nonapstm"||$table=="othermember")
        {
            $sql = "UPDATE `$table` SET `Professional`='$profession', `email`='$email',`address`='$address',`state`='$state',`city`='$city' WHERE `mobileno`='$contactNumber'";
        }
        
        $result = $mysqli->query($sql);
        if(!$result)
        {
            echo "'Error: (" . $mysqli->errno . ") " . $mysqli->error . "";
        }
        else
        {
            echo "<script>window.location.assign('myprofile.php?success');</script>";
        }
    }
    ?>
    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>User Profile</h1><br>
            <h3>Welcome
                <?php echo $_SESSION['name']; ?>. You can edit your Profile here</h3><br>
        </div>
    </section>
    <?php
    
    $table = $_SESSION['utype'];
    $contactNo = $_SESSION['uid'];
    
    if($table=="members_list") { $contactCName = "contact_no"; $passwordCName = "member_password"; $NameCName = "FullName"; $emailCName = "emailId"; }
    if($table=="nonapstm"||$table=="othermember") { $contactCName = "mobileno"; $passwordCName = "password"; $NameCName = "name"; $emailCName = "email"; }
           
    $sql="SELECT * FROM `$table` WHERE `$contactCName` = '$contactNo'";
    if($result = $mysqli->query($sql))
    {
        while ($row = $result->fetch_assoc())
        {
            if($table=="members_list")
            {
                $name=$row['FullName'];
                $tat=$row['tat_pandi'];
                $profession=$row['Professional'];
                $gender=$row['gender'];
                $email=$row['emailId'];
                $address=$row['address'];
                $mobile=$row['contact_no'];
                $address=$row['address'];
                $state=$row['state'];
                $city=$row['city'];
            }
            else
            {
                $name=$row['name'];
                $profession=$row['Professional'];
                $gender=$row['Gender'];
                $email=$row['email'];
                $address=$row['address'];
                $mobile=$row['mobileno'];
                $state=$row['state'];
                $city=$row['city'];
            }
        }
    }
    ?>
    <div class="container clearfix">
        <div class="table">
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <?php if($_SESSION['utype']=="apstm") { ?>
                <tr>
                    <td>Tat</td>
                    <td><?php echo $tat; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Profession</td>
                    <td><?php echo $profession; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><?php echo $mobile; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $address; ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $state; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $city; ?></td>
                </tr>
            </table>
            <br>
            <hr>
        </div>
    </div>
    <br><br>
    <form id="resetform" name="resetform" method="post">
        <div class="container clearfix">
            <div class="container clearfix">
                <h1>Edit Profile</h1><br>
            </div>
                <div class="w50">
                    <?php
                    if(isset($_GET['success'])) {
                        echo "<div><b>Profile Edited Successfully!</b></div>";
                    }
                    ?>
                    <div class="item">
                        <input type="text" value="<?php echo $profession; ?>" placeholder="Professional" name="Professional" id="Professional" maxlength="30" />
                    </div>
                    <br>
                    <div class="item">
                        <input type="text" value="<?php echo $email; ?>" name="email" id="email" placeholder="Email Id" maxlength="50" autocomplete="off"/>
                    </div>
                    <br>
                    <div class="item">
                        <input type="text" value="<?php echo $address; ?>" placeholder="Address" name="address" id="address" maxlength="100" />
                    </div>
                    <br>
                    <div class="item">
                        <select id="listBox" value="<?php echo $state; ?>"  name="state" onchange='selct_district(this.value)'><option value="">Select State</option></select> </div>
                    <br>
                    <div class="item">
                        <select id='secondlist' value="<?php echo $city; ?>" name="city"><option value="">Select City</option> </select>
                    </div>
                    <script>
                    $("#state").val("<?php echo $state; ?>");
                    $("#state").trigger("change");
                    $("#city").val("<?php echo $city; ?>");
                    </script>
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