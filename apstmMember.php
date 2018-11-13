<!doctype html>
<html>

<head>
    <?php require("includes/config.php"); 
    if(isset($_POST['register']))
    {
        $pandiname = secure($_POST['pandiname']);
        $txtname = secure($_POST['txtname']);
        $Professional = secure($_POST['Professional']);
        $mobileno = secure($_POST['mobileno']);
        $email = secure($_POST['email']);
        $Password = secure($_POST['Password']);
        $confPassword = secure($_POST['confPassword']);
        $address = secure($_POST['address']);
        $state = secure($_POST['state']);
        $city = secure($_POST['city']);
        
		if($Password==$confPassword)
		{
			$Password = Encrypt($Password);
			$sql = "UPDATE `members_list` SET `address`='$address', `Professional`='$Professional',`city`='$city', `state`='$state', `member_Created_Date`=NOW(), `member_password`='$Password', `member_is_registered`=1 WHERE `FullName`='$txtname'";
			echo $sql;
			$res =$mysqli->query($sql);
			if(!$res)
			{
				echo "'Error: (" . $mysqli->errno . ") " . $mysqli->error . "";
			}
			else
			{
				echo "<script>window.location.assign('thanks.php?apstm');</script>";
			}
		}
		else
		{
			echo "<script>alert('Passwords does not match! Something went wrong');</script>";
		}
    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
        .otpBox {
            background-color: #fff;
            padding: 9px;
            width: 250px;
            border: 1px solid #ccc;
            text-align: center;
            position: fixed;
            margin-left: -125px;
            left: 50%;
            top: 50%;
            height: 185px;
            margin-top: -135px;
            z-index: 101;
            display: none
        }

        .otpBox p {
            padding-bottom: 15px;
        }

        #otpsend {
            position: relative
        }

        #otpsend span.error {
            right: 0;
            bottom: 40px;
        }

        .otpBox input[type=text] {
            border-bottom: 1px solid #ccc;
            width: 100%;
            height: 35px;
            text-align: center;
            margin-bottom: 8px;
        }

        #spanChange {
            cursor: pointer
        }

        .overlay {
            position: fixed;
            z-index: 100;
            top: 0;
            height: 100%;
            display: none;
            width: 100%;
            background-image: url('images/transeBlack.png');
        }
    </style>
    <?php
	  ?>
</head>
<script type="text/javascript">
    var UserId = '';
    $(document).ready(function() {
        $('#mobileno').prop('readonly', false);
        $('#txtname').prop('readonly', false);
        $('#spanChange').click(function() {
            $('#correctMobileBox').css('display', 'block');
            $('#divoverlay').css('display', 'block');
        });

        $('#txtname').on('keyup', function(e) {
            var text = $('#txtname').val();

            autocompleteName(text);
        });

        $('#email').on('keyup', function() {
            var email = $('#email').val();
            var userId = $('#registerId').val();
            if (userId == '') {
                checkEmail(email, 0, 'Email_Check');
            } else {
                checkEmail(email, userId, 'Email_Check');
            }

        });

        $('#txtname').click(function() {
            $('#InputNameList').css('display', 'none');
        });

        $('#pandiname').on('change', function() {
            $('#mobileno').prop('readonly', false);
            $('.inputVal').val("");
            $('#InputNameList').css('display', 'none');
        });

        //$(function() {  
        $('#registerId').val(UserId);
        if (UserId != "") {
            getData(UserId);
        }

        $('#correctForm').validate({
            rules: {
                correctMobile: {
                    required: true
                }
            },
            messages: {
                correctMobile: {
                    required: "Required"
                }
            },
            submitHandler: function(form) {
                submitChangeMobile();
            }

        });

        $('#otpsendForm').validate({
            rules: {
                otpsend: {
                    required: true
                }
            },
            messages: {
                otpsend: {
                    required: "Required"
                }
            },
            submitHandler: function(form) {
                checkOTP();
            }

        });


        $("#registration").validate({
            rules: {
                txtname: {
                    required: true
                },
                Professional: {
                    required: true
                },
                Gender: {
                    required: true
                },
                mobileno: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "include/check_master.php?mode='update'",
                        type: "post"
                    }

                },
                userType: {
                    required: true

                },
                Password: {
                    required: true

                },
                confPassword: {
                    required: true,
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
                    required: 'Please Enter your Name'
                },
                Professional: {
                    required: 'Please Enter your Professional'
                },
                Gender: {
                    required: 'Please select gender'
                },
                mobileno: {
                    required: 'Please Enter your Mobile Number',
                    minlength: 'Please enter at least 10 digits'
                },
                email: {
                    required: 'Please Enter your Email Id',
                    email: 'Invalid Email Id',
                    remote: "Email Id address already exist"
                },
                userType: {
                    required: 'User type is required'

                },
                Password: {

                    required: 'Please enter password'
                },
                confPassword: {
                    required: 'Please enter confirm password',
                    equalTo: "Enter confirm password same as password"

                },
                address: {
                    required: 'Please Enter your Adderess'
                },
                state: {
                    required: 'Please Enter your state'
                },
                city: {
                    required: 'Please Enter your City'
                }
            },
            submitHandler: function(form) {
                // submitForm();
            }
        });

        $(document).on("click", "#btnSubmitForm", function() {
            if ($("#registration").valid()) {
                submitForm();
            }
        });

        $('#closeMobileBox').click(function() {
            $('#divoverlay').css('display', 'none');
            $('#correctMobileBox').css('display', 'none');
        });
        $('#closeOTPBox').click(function() {
            $('#divoverlay').css('display', 'none');
            $('#optLoginBox').css('display', 'none');
        });

    });


    function submitForm() {
        if ($('#emailerror').is(':visible') === false) {
            var data = new FormData(document.getElementById("registration"));

            jQuery.ajax({
                type: "POST",
                url: "include/registration.php",
                data: data,
                contentType: false,
                dataType: "json",
                async: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading").show();
                },
                success: function(data) {
                    $("#loading").hide();
                    if (data['message'] == 'INSERT') //come from new Register User
                    {
                        alert("Thank You For Registartion");

                        if (data.data.id != "") {
                            $.ajax({

                                url: 'login-success.php',
                                type: "POST",
                                dataType: "json",
                                data: {
                                    userId: data.data.id,
                                    member_user_type: data.data.member_user_type,
                                    lastname: data.data.lastname,
                                    first_name: data.data.first_name,
                                    fullname: data.data.FullName,
                                    contact_no: data.data.contact_no,
                                    address: data.data.address,
                                    emailId: data.data.emailId,
                                    gender: data.data.gender,
                                    city: data.data.city,
                                    state: data.data.state

                                },
                                success: function(datas) {
                                    if (datas.messsage == "ok") {
                                        /* window.location.href = 'index.html';*/
                                        window.location.href = "dashboard.php";
                                        // document.getElementById("registration").reset(); 
                                    }


                                }
                            });

                        }




                    } else if (data['message'] == 'UPDATE') //Update the User
                    {
                        $('#containerDiv').css('display', 'none');
                        $('#divMsg').css('display', 'block');
                        $('#showMsg').css('display', 'block');
                        $('#showMsg').html("<p style='padding-top:168px;'>Thank you, for updating profile</p>");
                        setTimeout(function() {
                            window.location.href = "dashboard.php";
                            //$('#containerDiv').css('display','block');
                            //$('#divMsg').css('display','none');
                            //$('#showMsg').css('display','none');
                            //document.getElementById('registration').reset(); 

                        }, 3000);


                    }


                },
                error: function() {
                    alert('fail');
                },

            });
            return false;
        }
    }

    function getData(UserId) {
        $('#emailerror').css('display', 'none');
        $('#mobileerror').css('display', 'none');
        $('.inputVal').val("");
        $('#divOTP').css('display', 'block');
        $('#divMobile').css('display', 'block');

        $('#btnSubmitForm').attr('disabled', true);
        $.getJSON('include/selectUser.php?userId=' + UserId + '&pagename=Users', function(data) {
            $.each(data, function(key, cat) {
                $("select#pandiname option").each(function() {
                    if ($(this).val() == cat.tat_pandi) {
                        //$(this).attr("selected","selected");    
                        $('#pandiname').val($(this).val()).change();
                    }
                });
                $('#txtname').val(cat.FullNameOnly);
                $('#txtname').prop('readonly', true);

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
                        //  $(this).attr("selected","selected");  
                        $('#gender').val($(this).val()).change();
                    }
                });
                $('#firstname').val(cat.first_name);
                $('#middlename').val(cat.middle_name);
                $('#lastname').val(cat.lastname);
                $('#Professional').val(cat.Professional);


                var contact = cat.contact_no,
                    vis = contact.slice(-4),
                    countNum = '';
                for (var i = (contact.length) - 4; i > 0; i--) {
                    countNum += '*';
                }

                $('#mobileno').val(countNum + vis);
                //	$('#mobileno').val(cat.contact_no); 
                $('#mobileno_otp').val(cat.contact_no);
                if (cat.contact_no != "") {
                    $('#mobileno').prop('readonly', true);
                }
                $('#email').val(cat.emailId);
                $('#address').val(cat.address);

                if ($("#mobileno").val().length > 0 && $('#registerId').val() != "") {
                    $('#spanChange').css('display', 'block');
                }
                $('#NotifuserId').val(UserId);
            });
        });

    }

    function checkOTP() {
        if ($('#otpsend').val() == $('#GeneratedOTP').val()) {

            $('#divoverlay').css('display', 'none');
            $('#optLoginBox').css('display', 'none');
            $('#btnSubmitForm').attr('disabled', false);
        } else {
            alert("Please enter valid OTP");
            $('#divoverlay').css('display', 'block');
            $('#optLoginBox').css('display', 'block');
            $('#btnSubmitForm').attr('disabled', true);
        }
    }

    function autocompleteName(Name) {
        var PandiId = $('#pandiname :selected').attr('value');
        if (Name.length > 0) {
            $.ajax({
                type: 'POST',
                url: 'include/autocompleteName.php',
                data: {
                    Sourcetxt: Name,
                    Mode: 'member',
                    PandiId: PandiId
                },
                success: function(data) {
                    if (data == "") {
                        //alert("No record" + Name);
                        $('#InputNameList').css('display', 'none');
                    } else {
                        $('#InputNameList').css('display', 'block');
                        $('#searchList').html(data);

                    }
                }
            });
        } else {

            $('#InputNameList').css('display', 'none');
        }

    }

    function checkEmail(value, userId, type) {
        if (value.length > 0) {
            $.ajax({
                type: 'POST',
                url: 'include/checkEmailMobile.php',
                data: {
                    value: value,
                    userId: userId,
                    type: type
                },
                success: function(data) {
                    if (data == "true" && type == "Email_Check") {
                        $('#emailerror').css('display', 'none');
                    } else if (data == "false" && type == "Email_Check") {
                        $('#emailerror').css('display', 'block');
                    }

                    if (data == "true" && type == "mobile_Check") {
                        $('#mobileerror').css('display', 'none');
                    } else if (data == "false" && type == "mobile_Check") {
                        $('#mobileerror').css('display', 'block');
                    }
                }
            });
        } else {
            $('#emailError').html();

        }

    }

    function set_Sourceitem(inputName, userId) {
        $('#txtname').val(inputName);
        $('#registerId').val(userId);
        getData(userId);
        $('#InputNameList').css('display', 'none');
        $('#txtname').valid();
    }

    function getOTP() {


        //var MobileNo=$("#mobileno").val();
        var MobileNo = $("#mobileno_otp").val();
        var length = 4;
        var OTP_Code = Math.floor(Math.pow(10, length - 1) + Math.random() * (Math.pow(10, length) - Math.pow(10, length - 1) - 1));
        $('#GeneratedOTP').val(OTP_Code);
        //var urls ="http://manage.sarvsms.com/api/send_transactional_sms.php?username=u21618&msg_token=5XzAPD&sender_id=YOROTP&message=Hi%2C+"+OTP_Code+"+is+your+One+Time+Password+on+YORiders.com.+Please+use+this+password+to+complete+your+phone+number+verification.&mobile="+MobileNo ;
        var urls = "http://api.textlocal.in/send/?username=vinodmaddi71@gmail.com&hash=743bb80a750d1c8e966dbf5e27b5c406fde4d812b1ce6894856b3a12425e366c&sender=SAMAJM&numbers=91" + MobileNo + "&message=Your%20OTP%20is%20" + OTP_Code + ",%20Thank%20you%20for%20registering%20with%20APSTM."
        $.ajax({
            type: "GET",
            url: urls,
            dataType: "json",
            crossDomain: true,
            success: function(data) {
                //	alert('success');
                $('#divoverlay').css('display', 'block');
                $('#optLoginBox').css('display', 'block');
            },
            error: function() {
                alert("Something went wrong");
            }

        });
        return false;
    }


    function submitChangeMobile() {
        if ($('#mobileerror').is(':visible') === false) {
            var data = new FormData(document.getElementById("correctForm"));

            jQuery.ajax({
                type: "POST",
                url: "include/notification.php",
                data: data,
                contentType: false,
                dataType: "json",
                async: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert("Your request for mobile number update is received, pending for approval");
                    $('#correctMobileBox').css('display', 'none');
                    $('#divoverlay').css('display', 'none');
                },
                error: function() {
                    alert('fail');
                },

            });
            return false;
        }
    }
</script>
<script type="text/javascript">
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }

    function isMobileNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {

            var mobileno = $('#correctMobile').val();
            var userId = $('#registerId').val();
            if (userId == '') {
                checkEmail(mobileno, 0, 'mobile_Check');
            } else {
                checkEmail(mobileno, userId, 'mobile_Check');
            }
            return true;
        }
    }
</script>

<body>
    <?php require("includes/header.php"); ?>
    <div id="containerDiv">
        <section class="welcomeText pat20">
            <div class="container clearfix">
                <h1>APSTM</h1>
                <p>Give your identity as an member of the family, you can fill all your family members details.</p>
                <div class="otpBox" id="correctMobileBox" style="display:none;">
                    <form id="correctForm">
                        <div>
                            <p style="float:left">Enter your mobile number <br> "Change mobile number subject to approval"</p>
                            <i style="float:right;position: absolute;right: 10px;" id="closeMobileBox" class="fa fa-times closeFormDiv" aria-hidden="true"></i>
                        </div>
                        <div class="otpSendid">
                            <input type="text" placeholder="Enter Mobile No." name="correctMobile" maxlength="10" id="correctMobile" value="" autocomplete="off" onkeypress="return isMobileNumber(event)" onkeyup="return isMobileNumber(event)" onkeydown="return isMobileNumber(event)" />
                            <span id="mobileerror" style="display:none;color:red;">Mobile no. already exists </span>
                            <input type="hidden" name="NotifuserId" id="NotifuserId" value="" />
                            <input type="hidden" name="requestFor" value="Change Mobile No." />
                        </div>
                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </div>
        </section>
        <section class="clearfix innerData">
            <div class="container">
                <form id="registration" name="registration">
                    <input type="hidden" id="registerId" name="registerId" />
                    <input type="hidden" name="userType" id="userType" value="2" />
                    <div class="formData">
                        <div class="item">
                            <select name="pandiname" id="pandiname" required>
                           <option value = " ">Select Tat</option>
                           <?php
                            $sql="SELECT * FROM `tat` ORDER BY `tat`";
                            if($result = $mysqli->query($sql))
                            {
                            while ($row = $result->fetch_assoc())
                            {
                            ?>
                               <option value = "<?php echo $row['sr']; ?>"><?php echo $row['tat']; ?></option>
                            <?php } 
                            } ?>
                        </select>
                        </div>
                        <div class="clearfix">
                            <h2>Personal Details</h2>
                        </div>
                        <div class="item">
                            <div class="w100">
                                <div class="item">
                                    <select name="Gender" id="gender" style="display:none;" required>
                                        <option value=""> Gender</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <input list="nameDataList" type="text" name="txtname" id="txtname" placeholder="Name" maxlength="100" autocomplete="off" required/>
                            <datalist id="nameDataList">

                            </datalist>
                            <div id="InputNameList" style="display:none;">
                                <ul id="searchList"></ul>
                            </div>
                        </div>
                        <div class="item">
                            <input type="text" placeholder="Professional" name="Professional" id="Professional" maxlength="30" class="inputVal" required/>
                        </div>
                        <div class="clearfix">
                            <h2>Your Profile Details</h2>
                        </div>
                        <div class="item">
                            <div class="w50" id="divMobile" style="display:none;">
                                <div class="item">
                                    <input type="text" placeholder="Mobile No." name="mobileno" id="mobileno" class="inputVal" onkeypress="return isNumberKey(event)" maxlength="10" />
                                    <input type="hidden" placeholder="Mobile No." name="mobileno_otp" id="mobileno_otp" class="inputVal" maxlength="10" />
                                    <span id="spanChange" style="display:none;">Change</span>
                                </div>
                            </div>
                            <div class="w50" style="display:none;" id="divOTP">
                                <div class="item">
                                    <input type="button" name="OTPbutton" id="OTPbutton" value="Request OTP" onclick="getOTP();" />
                                </div>
                            </div>
                            <div class="item">
                                <input type="text" name="email" id="email" placeholder="Email Id" class="inputVal" maxlength="50" autocomplete="off" required/>
                                <span id="emailerror" style="display:none;color:red;">Email Id already exists </span>
                            </div>
                            <div class="item">
                                <input type="password" placeholder="Password" name="Password" id="Password" maxlength="20" class="inputVal" required/>
                            </div>
                            <div class="item">
                                <input type="password" placeholder="Confirm Password" name="confPassword" class="inputVal" id="confPassword" maxlength="20" required />
                            </div>
                        </div>
                        <div class="item">
                            <input type="text" placeholder="Address" name="address" id="address" class="inputVal" maxlength="100" required/>
                        </div>
                        <div id="selection">
                            <select id="listBox" name="state" class="inputVal" onchange='selct_district(this.value)' required> </select>
                        </div>
                        <br>
                        <div class="item">
                            <select id='secondlist' class="inputVal" name="city" required>
                           <option value="">Select City</option>
                        </select>
                        </div>
                        <div class="item">
                            <input type="submit" value="SUBMIT" id="btnSubmitForm" name="register"/>
                        </div>
                        <div class='resp_code frms'>
                            <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
                                <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <div class="otpBox" id="optLoginBox" style="display:none;">
        <form id="otpsendForm">
            <div>
                <p style="float:left">Enter OTP, which is sent on your mobile number</p>
                <i style="float:right;position: absolute;right: 10px;" id="closeOTPBox" class="fa fa-times closeFormDiv" aria-hidden="true"></i>
            </div>
            <input type="hidden" id="GeneratedOTP" value="">
            <div class="otpSendid"> <input type="text" placeholder="Enter OTP" name="otpsend" maxlength="4" id="otpsend" class="number" value="" /></div>
            <input type="submit" value="Submit" name="submitOTP"/>
        </form>
    </div>
    <div class="overlay" id="divoverlay" style="display:none;"></div>
    <div style="min-height:500px;display:none;" id="divMsg">
        <div style="display:none;" id="showMsg" class="ShowMsg">
            Thank You.
        </div>
    </div>
    <div id="loading" style="display:none">
        <img id="loading-image" src="images/default.gif" />
    </div>
    <script>
        //using course to load value of level
        $('#txtname').keyup(function(e) {
            e.preventDefault();
            var name = $(this).val();
            var tat = $('#pandiname').val();
            $.post(
                "backend.php", {
                    name: name,
                    tat: tat
                },
                function(data) {
                    $('#nameDataList').html(data);
                }
            );
        });
        
        $('#txtname').blur(function(e) {
            e.preventDefault();
            var name = $(this).val();
            var tat = $('#pandiname').val();
            $.post(
                "backend.php", {
                    name: name,
                    tat: tat,
                    getnum: true
                },
                function(data) {
                    var Data = JSON.parse(data);
                    if(Data[0]!=""){
                        $('#divMobile').css('display', 'block');
                        $('#divOTP').css('display', 'block');
                        $('#mobileno').val(Data[0]);
                    }
                    $('#email').val(Data[1]);
                }
            );
        });
    </script>
    <?php require("includes/footer.php"); ?>
</body>

</html>