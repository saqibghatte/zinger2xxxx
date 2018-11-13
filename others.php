<!doctype html>
<html>

<head>
    <?php require("includes/config.php");
    if(isset($_POST['register']))
    {
        $txtname = secure($_POST['txtname']);
        $Gender = secure($_POST['Gender']);
        $Professional = secure($_POST['Professional']);
        $mobileno = secure($_POST['mobileno']);
        $email = secure($_POST['email']);
        $Password = secure($_POST['Password']);
        $confPassword = secure($_POST['confPassword']);
        $address = secure($_POST['address']);
        $state = secure($_POST['state']);
        $city = secure($_POST['city']);
        $referenceNameone = secure($_POST['referenceNameone']);
        $referenceMobileone = secure($_POST['referenceMobileone']);
        $referenceNametwo = secure($_POST['referenceNametwo']);
        $referenceMobiletwo = secure($_POST['referenceMobiletwo']);
        
		if($Password==$confPassword)
		{
			$Password = Encrypt($Password);
            $sql = "INSERT INTO `othermember` (`name`, `Gender`, `Professional`, `mobileno`, `email`, `Password`, `address`,`state`, `city`, `referenceNameone`, `referenceMobileone`, `referenceNametwo`, `referenceMobiletwo`,`active`, `isRegistered`) VALUES ('$txtname','$Gender','$Professional','$mobileno','$email','$Password','$address','$state','$city','$referenceNameone','$referenceMobileone','$referenceNametwo','$referenceMobiletwo',0,1)";
			$res =$mysqli->query($sql);
			if(!$res)
			{
				echo "'Error: (" . $mysqli->errno . ") " . $mysqli->error . "";
			}
			else
			{
				echo "<script>window.location.assign('thanks.php?others');</script>";
			}
		}
		else
		{
			echo "<script>alert('Passwords does not match! Something went wrong');</script>";
		}
    }
    ?>

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
    <script>
        var UserId = '';
        $(function() {
            $('#registerId').val(UserId);

            $('#email').on('keyup', function() {
                var email = $('#email').val();
                var userId = $('#registerId').val();
                if (userId == '') {
                    checkEmail(email, 0, 'Email_Check');
                } else {
                    checkEmail(email, userId, 'Email_Check');
                }

            });

            /*$('#mobileno').on('keyup',function(){
            	var mobileno=$('#mobileno').val();
            	var userId = $('#registerId').val();
            	if(userId == ''){
            		checkEmail(mobileno,0,'mobile_Check');
            	}else{
            		checkEmail(mobileno,userId,'mobile_Check');
            	}
            	
            });*/

            $.getJSON('include/selectUser.php?userId=' + UserId + '&pagename=Users', function(data) {
                $.each(data, function(key, cat) {
                    $("select#listBox option").each(function() {
                        if ($(this).val() == cat.state) {
                            $('#listBox').val($(this).val()).change();
                        }
                    });
                    $("select#secondlist option").each(function() {
                        if ($(this).val() == cat.city) {
                            $('#secondlist').val($(this).val()).change();
                        }
                    });
                    $("select#gender option").each(function() {
                        if ($(this).val() == cat.gender) {
                            $(this).attr("selected", "selected");

                        }
                    });

                    $('#txtname').val(cat.FullName);
                    $('#Professional').val(cat.Professional);
                    $('#mobileno').val(cat.contact_no);
                    $('#email').val(cat.emailId);
                    $('#address').val(cat.address);
                });
            });
            $("#registration").validate({
                rules: {
                    txtname: {
                        required: true
                    },
                    /*firstname:             
                    {                      
                    required:true                  
                    },                      
                    middlename:                     
                    {                       
                    required:true                  
                    },                       
                    lastname:                     
                    {                         
                    required:true                    
                    }, */
                    Professional: {
                        required: true
                    },
                    Gender: {
                        required: true
                    },
                    mobileno: {
                        required: true,
                        // remote:"include/check_master.php",
                        minlength: 10

                    },
                    email: {
                        required: true,
                        email: true
                        //,
                        //	remote:"include/check_master.php"

                    },
                    userType: {
                        required: true

                    },
                    Password: {
                        required: true

                    },
                    confPassword: {

                        equalTo: "#Password"

                    },
                    address: {

                        required: true

                    },
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    }
                },

                messages: {
                    txtname: {
                        required: 'Please enter your name'
                    },
                    /*firstname:
                    {
                    	required:'Please Enter your first Name'
                    },
                    middlename:
                    {
                    	required:'Please Enter your middel Name'
                    },
                    lastname:
                    {
                    	required:'Please Enter your last Name'
                    },*/
                    Professional: {
                        required: 'Please enter your professional'
                    },
                    Gender: {
                        required: 'Please select gender'
                    },
                    mobileno: {
                        required: 'Please enter your mobile number',
                        //remote:"Mobile no. already exist",
                        minlength: 'Please enter at least 10 digits'

                    },
                    email: {
                        required: 'Please enter your email id',
                        email: 'Invalid email id'
                        //,
                        //remote:"Email id already exist"
                    },
                    userType: {
                        required: 'User type is required'

                    },
                    Password: {

                        required: 'Please enter password',
                    },
                    confPassword: {
                        required: 'Please enter confirm password',
                        equalTo: "Enter confirm password same as password"

                    },
                    address: {
                        required: 'Please enter your adderess'
                    },
                    state: {
                        required: 'Please enter your state'
                    },
                    city: {
                        required: 'Please enter your city'
                    }
                },

                submitHandler: function(form) {
                    submitForm();
                }
            });
        });
    </script>

    <SCRIPT type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;


            return true;
        }

        function isMobileNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {

                var mobileno = $('#mobileno').val();
                var userId = $('#registerId').val();
                if (userId == '') {
                    checkEmail(mobileno, 0, 'mobile_Check');
                } else {
                    checkEmail(mobileno, userId, 'mobile_Check');
                }



                return true;
            }



        }
    </SCRIPT>

</head>

<body>
    <?php require("includes/header.php"); ?>
    <div id="containerDiv">
        <section class="welcomeText pat20">
            <div class="container clearfix">
                <h1>Other</h1>
                <p>Give your identity as an member of the family, you can fill all your family members details.</p>
            </div>
        </section>
        <form id="registration" name="registration" method="post">
            <input type="hidden" id="registerId" name="registerId">
            <input type="hidden" name="userType" id="userType" value="3">
            <section class="clearfix innerData">
                <div class="container">
                    <div class="formData">
                        <input type="hidden" name="pandiname" id="pandiname">

                        <div class="clearfix">
                            <h2>Personal Details</h2>
                        </div>

                        <div class="item">
                            <input type="text" name="txtname" id="txtname" placeholder="Name" maxlength="100" />
                        </div>
                        <div class="item">
                            <div class="w100">
                                <div class="item">
                                    <select name="Gender" id="gender">
                                        <option value=""> Gender</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <input type="text" placeholder="Professional" name="Professional" id="Professional" maxlength="30" />
                        </div>
                        <div class="clearfix">
                            <h2>Your Contact Details</h2>
                        </div>
                        <div class="item">
                            <div class="w50">
                                <div class="item">
                                    <input type="text" placeholder="Mobile No." name="mobileno" id="mobileno" maxlength="10" autocomplete="off" onkeypress="return isMobileNumber(event)" onkeyup="return isMobileNumber(event)" onkeydown="return isMobileNumber(event)" />
                                    <span id="mobileerror" style="display:none;color:red;">Mobile no. already exists </span>
                                </div>
                            </div>
                            <div class="w50">
                                <div class="item">
                                    <input type="email" name="email" id="email" placeholder="Email Id" maxlength="50" autocomplete="off" />
                                    <span id="emailerror" style="display:none;color:red;">Email Id already exists </span>
                                </div>
                            </div>
                            <div class="item"> <input type="password" placeholder="Password" name="Password" id="Password" maxlength="20" /> </div>
                            <div class="item"> <input type="password" placeholder="Confirm Password" name="confPassword" id="confPassword" maxlength="20" /> </div>
                        </div>
                        <div class="item">
                            <input type="text" placeholder="Address" name="address" id="address" maxlength="100" />
                        </div>
                        <div id="selection">
                            <select id="listBox" name="state" onchange='selct_district(this.value)'><option value="">Select State</option></select> </div>
                        <br>
                        <div class="item">
                            <select id='secondlist' name="city"><option value="">Select City</option> </select>
                        </div>
                        <div class="item">
                            <input type="text" name="referenceNameone" placeholder="Reference Name(one)" id="referenceNameone" maxlength="50">
                        </div>
                        <div class="item">
                            <input type="text" placeholder="Reference Mobile Number(one)" name="referenceMobileone" id="referenceMobileone" maxlength="10" onkeypress="return isNumberKey(event)">
                        </div>
                        <div class="item">
                            <input type="text" name="referenceNametwo" placeholder="Reference Name(two)" id="referenceNametwo" maxlength="50">
                        </div>
                        <div class="item">
                            <input type="text" name="referenceMobiletwo" placeholder="Reference Mobile Number(two)" id="referenceMobiletwo" maxlength="10" onkeypress="return isNumberKey(event)">
                        </div>
                        <div class="item">

                            <input type="submit" value="SUBMIT" name="register" />
                        </div>
                        <div class='resp_code frms'>
                            <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
                                <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>

    <div style="min-height:500px;display:none;" id="divMsg">
        <div style="display:none;" id="showMsg" class="ShowMsg">
            Thank You
        </div>
    </div>
    <div id="loading" style="display:none">
        <img id="loading-image" src="images/default.gif" />
    </div>

    <?php require("includes/footer.php"); ?>
</body>

</html>