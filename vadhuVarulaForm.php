<!doctype html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akhil Padmashali Samaj Trust (Mumbai)</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-awsome.css">
    <script src="js/mainUrl.js"></script>
    <script language="Javascript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src='js/state.js'></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>


    <script charset="utf-8" src="js/jquery.dataTables.js"></script>
    <script charset="utf-8" src="js/dataTables.tableTools.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/timepicki.js"></script>
    <script src='js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .otpBox{ background-color: #fff; padding: 9px; width: 250px; border:1px solid #ccc; text-align: center; position: fixed; margin-left: -125px; left: 50%; top:50%; height: 152px; margin-top: -135px; z-index: 101; display: none}
.otpBox p{ padding-bottom: 15px;}
#otpsend{ position: relative}
#otpsend span.error{ right: 0; bottom: 40px;}
.otpBox input[type=text]{ border-bottom: 1px solid #ccc; width: 100%;  height: 35px; text-align: center; margin-bottom: 8px;}
#spanChange {cursor:pointer}
	.overlay {
    position: fixed;
    z-index: 100;
    top: 0;
    height: 100%;
    display: none;
    width: 100%;
    background-image: url('images/transeBlack.png');
}


.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

#progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
}
#progress-wrp .progress-bar{
    height: 20px;
    border-radius: 3px;
    background-color: #f39ac7;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}


	</style>
</head>
<script type="text/javascript">
    $(document).ready(function() {
        $("#txtDOB").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: 0,
            changeYear: true,
            yearRange: "-40:+0"
        });

        $('#txtDOB').on('change', function() {
            $('#txtDOB').valid();

        });
        $("#txtTime").timepicki();

        $('#selYesNo').on('change', function() {
            var selYesNo = $('#selYesNo :selected').val();
            if (selYesNo == "Yes") {
                $('#txtHPlace').css('display', 'block');
            } else {
                $('#txtHPlace').css('display', 'none');
            }
        });

        document.getElementById('Profilepics').onchange = function() {
            $('.file-browse-txt').html(this.value);
            readURL(this);
        }

        if (window.File && window.FileList && window.FileReader) {
            $("#photoGallery").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#photoGallery");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }

        // $('#correctform').validate({
        // rules:{
        // correctmobile:{required:true}
        // },
        // messages:{correctmobile:{required:"required"}},
        // submithandler: function(form) {
        // submitchangemobile();
        // }

        // });

        $("#vadhuVForm").validate({
            rules: {
                txtname: {
                    required: true
                },
                txtDOB: {
                    required: true
                },
                /*txtTime:{
                	required:true	
                	},*/
                txtPlace: {
                    required: true
                },
                txtHeight: {
                    required: true
                },
                txtComplexion: {
                    required: true
                },
                txtStatus: {
                    required: true
                },
                txtAddress: {
                    required: true
                },
                txtNPlace: {
                    required: true
                },
                txtQualifi: {
                    required: true
                },
                txtOccupation: {
                    required: true
                },
                txtPWork: {
                    required: true
                },
                txtEDetails: {
                    required: true
                },
                txtDesignation: {
                    required: true
                },
                txtIncome: {
                    required: true
                },
                selYesNo: {
                    required: true
                },
                txtHPlace: {
                    required: true
                },
                txtCPerson: {
                    required: true
                },
                txtCAddress: {
                    required: true
                },
                txtEmailId: {
                    required: true,
                    email: true,
                },
                txtMobile: {
                    required: true,
                    minlength: 10
                },
                txtDesciption: {
                    required: true,
                    minlength: 50
                },

                selLookingFor: {
                    required: true

                }
            },

            messages: {
                txtname: {
                    required: "Required"
                },
                txtDOB: {
                    required: "Required"
                },
                /*txtTime:{
                	required:"Required"   	
                		},*/
                txtPlace: {
                    required: "Required"
                },
                txtHeight: {
                    required: "Required"
                },
                txtComplexion: {
                    required: "Required"
                },
                txtStatus: {
                    required: "Required"
                },
                txtAddress: {
                    required: "Required"
                },
                txtNPlace: {
                    required: "Required"
                },
                txtQualifi: {
                    required: "Required"
                },
                txtOccupation: {
                    required: "Required"
                },
                txtPWork: {
                    required: "Required"
                },
                txtEDetails: {
                    required: "Required"
                },
                txtDesignation: {
                    required: "Required"
                },
                txtIncome: {
                    required: "Required"
                },
                selYesNo: {
                    required: "Required"
                },
                txtHPlace: {
                    required: "Required"
                },
                txtCPerson: {
                    required: "Required"
                },
                txtCAddress: {
                    required: "Required"
                },
                txtEmailId: {
                    required: "Required",
                    email: "Enter valid Email ID",
                },
                txtMobile: {
                    required: "Required",
                    minlength: "Enter valid Mobile No."
                },
                txtDesciption: {
                    required: "Required",
                    minlength: "Write atleast 50 characters "
                },
                selLookingFor: {
                    required: "Required"

                }
            },
            submithandler: function(form) {
                //submitForm();
            }
        });


        $("#txtFDOB").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: 0,
            changeYear: true
        });

        var d = new Date();
        var month = d.getMonth() + 1;
        $('#spandate').text(d.getDate() + "-" + month + "-" + d.getFullYear());

        $("#familyForm").validate({
            rules: {
                firstname: {
                    required: true
                },
                relationship: {
                    required: true
                },
                txtFDOB: {
                    required: true
                }
            },

            messages: {
                firstname: {
                    required: 'Required'
                },
                relationship: {
                    required: 'Required'
                },
                txtFDOB: {
                    required: 'Required'
                }

            },

            submitHandler: function(form) {
                submitFamilyForm();
            }
        });



        /*$('#btnAddFamilyM').click(function(){
				if($('#firstname').val() != "" && $('#relationship :selected').val() != "" && $('#txtFQuali').val() != "" && $('#txtRemark').val() != "")	{
				$("#table_Familylist").append("<tr><td></td><td>"+$('#firstname').val()+"</td><td>"+$('#relationship :selected').val()+"</td><td>"+$('#txtFQuali').val()+"</td><td>"+$('#txtRemark').val()+"</td></tr>");
				$('#spanErrorF').css('display','none');
				
				 var data = table.rows().data();
		
		alert(data);
				}else{
					$('#spanErrorF').css('display','block');
				}
				
				
				});*/


        /***/
        var FMArray;
        var t = $('#table_Familylist').DataTable();
        var counter = 1;

        $('#btnAddFamilyM').on('click', function() {
            $('#spanErrorF').css('display', 'none');
            if ($('#firstname').val() != "" && $('#relationship :selected').val() != "" && $('#txtFQuali').val() != "" && $('#txtRemark').val() != "") {
                t.row.add([
                    counter,
                    $('#firstname').val(),
                    $('#relationship :selected').val(),
                    $('#txtFQuali').val(),
                    $('#txtRemark').val(),
                    '<a id="btnFMRemove">Remove</a>'

                ]).draw(false);

                counter++;

                FMArray = t.rows().data().toArray();

                $('#firstname').val("");
                $('#relationship').val("");
                $('#txtFQuali').val("");
                $('#txtRemark').val("");

                //alert(JSON.stringify(FMArray[0][2]));

            } else {
                $('#spanErrorF').css('display', 'block');
            }

        });

        $(document).on("click", "#btnSubmitForm", function() {
            if ($("#vadhuVForm").valid()) {
                submitForm(FMArray);
            }


        });

        document.getElementById("uploadBtn").onchange = function() {
            //   document.getElementById("uploadFile").value = this.value;

        };

        $('#uploadBtn').MultiFile({
            onFileChange: function() {

                console.log(this, arguments);
            }
        });


        /***/

    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }


    function submitForm(FMArray) {

        var arrayfm = JSON.stringify(FMArray);
        var data = new FormData(document.getElementById("vadhuVForm"));
        data.append('FMArray', arrayfm);
        jQuery.ajax({
            type: "POST",
            url: "include/vadhuVForm.php",
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
                $('#containerDiv').css('display', 'none');
                $('#divMsg').css('display', 'block');
                $('#showMsg').css('display', 'block');
                $('#showMsg').html("<p style='padding-top:168px;'>Thank you, Your details submitted successfully </p>");
                setTimeout(function() {
                    $('#divMsg').css('display', 'none');
                    $('#showMsg').css('display', 'none');
                    $('#containerDiv').css('display', 'block');
                    document.getElementById('vadhuVForm').reset();
                }, 3000);
            },
            error: function() {
                alert('fail');
            },

        });
        return false;
    }

    function submitFamilyForm() {


        var data = new FormData(document.getElementById("familyForm"));

        jQuery.ajax({
            type: "POST",
            url: baseUrl + "include/VVfamilymember.php",
            data: data,
            contentType: false,
            dataType: "json",
            async: false,
            cache: false,
            processData: false,
            success: function(data) {


                $("form").trigger("reset");


            },
            error: function() {
                alert('fail');
            },

        });
        return false;
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profileimg').css('display', 'block');
                $('#profileimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }

        /*var data = new FormData(document.getElementById("upload_form"));
		$.ajax({
    url : "include/vaduVarulaPhoto.php",
    type: "POST",
    data : data,
    contentType: false,
    cache: false,
    processData:false,
    xhr: function(){
        
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
                
                $(".progress-bar").css("width", + percent +"%");
                $(" .status").text(percent +"%");
            }, true);
        }
        return xhr;
    },
    mimeType:"multipart/form-data"
}).done(function(res){ //
alert(res);
   //$(result_output).html(res); //output response from server
   // submit_btn.val("Upload").prop( "disabled", false); //enable submit button once ajax is done
});
	*/

    }

</script>


<body>
    <div class="wrapper">
        <header id="header">

        </header>
        <div id="containerDiv">
            <section class="welcomeText pat20">
                <div class="container clearfix">
                    <h1>Vadhu-Varula Suchak Samiti</h1>

                </div>
            </section>
            <section class="clearfix innerData">
                <div class="container">


                    <div class="formData">
                        <form id="vadhuVForm" name="vadhuVForm" method="POST" enctype="multipart/form-data">
                            <div class="clearfix">
                                <h2>Looking For</h2>
                            </div>
                            <div class="item">
                                <select name="selLookingFor" id="selLookingFor">
                                    <option value=" ">Select</option>
                                    <option value="Groom">Groom (Varula)</option>
                                    <option value="Bride">Bride (Vadhu)</option>
                                </select>
                            </div>
                            <div class="clearfix">
                                <h2>Personal Details</h2>
                            </div>
                            <div class="w50">
                                <div class="item">
                                    <h2>Upload Your Photo</h2>
                                    <!-- <form action="process.php" method="post" enctype="multipart/form-data" id="upload_form">-->
                                    <input class="form-control fileUpload" placeholder="Upload image" id="Profilepics" name="Profilepics" type="file">
                                    <div class="file-browse">
                                        <span class="file-browse-txt" id="LogoProfile" name="file[]" style="display:none;">Select Logo </span>
                                        <span class="browse" style="display:none;">Browse</span>

                                    </div>
                                    <!-- <input name="__submit__" type="submit" value="Upload"/>
						</form>
			<div id="progress-wrp"><div class="progress-bar"></div ><div class="status">0%</div></div>
			<div id="output"></div>	-->
                                </div>
                            </div>
                            <div class="w50">
                                <div class="item">
                                    <img id="profileimg" src="images/userIcon.jpg" width="34px" height="34px" style="display:none;">
                                </div>
                            </div>

                            <div class="item">
                                <input type="hidden" id="registerId" name="registerId" value="212" />
                                <input type="text" name="txtname" id="txtname" placeholder="Full Name" maxlength="100" autocomplete="off" />
                            </div>
                            <div class="item">
                                <input type="text" name="txtDOB" id="txtDOB" placeholder="Date of Birth" autocomplete="off" readonly />
                            </div>
                            <div class="item">
                                <input type="text" name="txtTime" id="txtTime" placeholder="Time" autocomplete="off" />
                            </div>
                            <div class="item">
                                <input type="text" name="txtPlace" id="txtPlace" placeholder="Place of Birth" maxlength="20" autocomplete="off" />
                            </div>
                            <div class="item">
                                <input type="text" name="txtHeight" id="txtHeight" placeholder="Height(cm)" maxlength="3" autocomplete="off" onkeypress="return isNumber(event)" />
                            </div>
                            <div class="item">
                                <select name="txtComplexion" id="txtComplexion">
                                    <option value=" ">Select Complexion</option>
                                    <option value="Fair">Fair</option>
                                    <option value="Wheatish">Wheatish</option>
                                    <option value="Dark">Dark</option>
                                </select>
                            </div>
                            <div class="item">
                                <input type="text" name="txtStatus" id="txtStatus" placeholder="Status" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" name="txtAddress" id="txtAddress" placeholder="Present Address" maxlength="200" />
                            </div>

                            <div class="item">
                                <input type="text" name="txtNPlace" id="txtNPlace" placeholder="Native Place : Village/District" maxlength="20" />
                            </div>

                            <div class="clearfix">
                                <h2>Education/Employment Details</h2>
                            </div>
                            <div class="item">
                                <input type="text" name="txtQualifi" id="txtQualifi" placeholder="Qualifications" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Specialization if any " name="txtSpeciali" id="txtSpeciali" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Occupation" name="txtOccupation" id="txtOccupation" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Place of Work" name="txtPWork" id="txtPWork" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Employer's Details" name="txtEDetails" id="txtEDetails" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Designation" name="txtDesignation" id="txtDesignation" maxlength="50" />
                            </div>
                            <div class="item">
                                <select name="txtIncome" id="txtIncome">
                                    <option value="">Select Income</option>
                                    <option value="upto 2Lac">upto 2Lac</option>
                                    <option value="2Lac to 5Lac">2Lac to 5Lac</option>
                                    <option value="6Lac to 10Lac">6Lac to 10Lac</option>
                                    <option value="10Lac above">10Lac above</option>
                                </select>
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Hobbies" name="txtHobbies" id="txtHobbies" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Write something " name="txtDesciption" id="txtDesciption" maxlength="500" />
                            </div>

                            <div class="clearfix">
                                <h2>Property Details</h2>
                            </div>
                            <div class="item">
                                <select name="selYesNo" id="selYesNo">
                                    <option value=" ">Do you have your own House/Apartment :Yes/No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Place/City" name="txtHPlace" id="txtHPlace" maxlength="50" style="display:none;" />
                            </div>
                            <div class="clearfix">
                                <h2>Contact Details</h2>
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Contact Person" name="txtCPerson" id="txtCPerson" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Email ID" name="txtEmailId" id="txtEmailId" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Contact Address" name="txtCAddress" id="txtCAddress" maxlength="200" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Mobile No." name="txtMobile" id="txtMobile" maxlength="10" onkeypress="return isNumber(event)" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Telephone" name="txtTele" id="txtTele" maxlength="11" onkeypress="return isNumber(event)" />
                            </div>

                            <div class="clearfix">
                                <h2>Family Details</h2>
                            </div>
                            <!---->
                            <!--<form id="familyForm" name="familyForm">-->
                            <!--
                            <input type="hidden" id="memberId" name="memberId" value="212">
                            <section class="clearfix innerData" style="padding-top:0">

                                <div class="container">
                                    <span class="error" id="spanErrorF" style="color:red;display:none;">All Fields Required.</span>
                                    <div class="famMemberData">
                                        <div class="form clearfix">
                                            <div class="item">

                                                <input type="text" name="firstname" id="firstname" placeholder="Name" maxlength="50" />

                                            </div>
                                            <div class="item">
                                                <div class="w100">
                                                    <select name="relationship" id="relationship">
                                                        <option value="">Select Relation</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sister">Sister</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <input type="text" placeholder="Qualification" name="txtFQuali" id="txtFQuali" maxlength="50" />
                                            </div>
                                            <div class="item">
                                                <input type="text" placeholder="Remarks/Service Details" name="txtRemark" id="txtRemark" maxlength="100" />
                                            </div>
                                            <div class="item btnAdd">
                                                <input type="button" value="Add" id="btnAddFamilyM" />
                                            </div>

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

                            <div class="viewManagerlist">
                                <div id="page_container">
                                    <table class="datatable table table-striped" id="table_Familylist">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Name</th>
                                                <th>Relation</th>
                                                <th>Qualification</th>
                                                <th>Remarks/Service</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tbody>
                                    </table>

                                </div>
                            </div>
-->

                            <!---->
                            <div class="clearfix">
                                <h2>Kundali Details</h2>
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Nakshatra/Charan" name="txtNakshtra" id="txtNakshtra" maxlength="50" />
                            </div>
                            <div class="item">
                                <select name="txtRashi" id="txtRashi">
                                    <option value="">Select Rashi</option>
                                    <option value="Aries">Aries</option>
                                    <option value="Taurus">Taurus</option>
                                    <option value="Gemini">Gemini</option>
                                    <option value="Cancer">Cancer</option>
                                    <option value="Leo">Leo</option>
                                    <option value="Virgo">Virgo</option>
                                    <option value="Libra">Libra</option>
                                    <option value="Scorpio">Scorpio</option>
                                    <option value="Sagittarius">Sagittarius</option>
                                    <option value="Capricorn">Capricorn</option>
                                    <option value="Aquarius">Aquarius</option>
                                    <option value="Pisces">Pisces</option>
                                </select>
                            </div>
                            <div class="item">
                                <select name="selMangal" id="selMangal">
                                    <option value=" ">Select Mangal</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>




                            <div class="item">
                                <div class="description clearfix">
                                    <h2>Upload Photos/Kundali</h2>
                                    <!-- <input type="file" id="photoGallery" name="photoGallery[]" multiple />-->

                                    <div class="fileUploadDiv">
                                        <!-- <input type="text" class="fileLable13" id="uploadFile" placeholder="Choose File" disabled="disabled" />-->
                                        <div class="fileUploads">
                                            <!--<span class="brow">Browse</span>-->
                                            <input id="uploadBtn" type="file" name="photoGallery" class="maxsize-1024 upload" />
                                        </div>
                                    </div>

                                    <div class="three-jpg-container" id="multifile-listn"></div>
                                </div>
                            </div>

                            <div class="item">
                                <input type="submit" value="Submit" name="submit2" id="btnSubmitForm" />
                            </div>





                            <div class='resp_code frms'>
                                <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
                                    <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
                                </div>
                            </div>
                        </form>
                    </div>


            </section>
        </div>

        <div class="overlay" id="divoverlay" style="display:none;"></div>

        <div style="min-height:500px;display:none;" id="divMsg">
            <div style="display:none;" id="showMsg" class="ShowMsg">
                Thank You
            </div>
        </div>
        <div id="loading" style="display:none">
            <img id="loading-image" src="images/default.gif" />
        </div>

        <footer class="clearfix">
            <div class="container">
                <span>Â© 2016 akhilpadmashalisamaj.com. All Rights Reserved</span>
                <img src="images/socialicon.jpg" style="float:right" />
            </div>
        </footer>
    </div>
</body>

</html>


<?php 
    
    if(isset($_POST['submit2']))
    
    
    {
        
        
    $lookingfor=$_POST['selLookingFor'];
    $profilepic=$_POST['Profilepics'];
    $name=$_POST['txtname'];
    $dateofbirth=$_POST['txtDOB'];
    $time=$_POST['txtTime'];
    $place=$_POST['txtPlace'];
    $height=$_POST['txtHeight'];
    $complexion=$_POST['txtComplexion'];
    $status=$_POST['txtStatus'];
    $address=$_POST['txtAddress'];
    $place=$_POST['txtNPlace'];
    $qualification=$_POST['txtQualifi'];
    $special=$_POST['txtSpeciali'];
    $occupation=$_POST['txtOccupation'];
    $work=$_POST['txtPWork'];
    $details=$_POST['txtEDetails'];
    $designation=$_POST['txtDesignation'];
    $income=$_POST['txtIncome'];
    $hobbies=$_POST['txtHobbies'];
    $desc=$_POST['txtDesciption'];
    $yesno=$_POST['selYesNo'];
    $hplace=$_POST['txtHPlace'];
    $cperson=$_POST['txtCPerson'];
    $emailid=$_POST['txtEmailId'];
    $caddress=$_POST['txtCAddress'];
    $mobile=$_POST['txtMobile'];
    $tele=$_POST['txtTele'];
    $nakshatra=$_POST['txtNakshtra'];
    $rashi=$_POST['txtRashi'];
    $mangal=$_POST['selMangal'];
    $kundlipic=$_POST['photoGallery'];
//    $dateofbirth=$_POST['photoGallery'];
    
    
        
        
        
        
        
    
    
    
    }
?>
