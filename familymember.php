<!doctype html>
<html>

<head>
    <?php require("includes/config.php");
    if(!isLoggedIn())
    {
          header("Location:index.php");
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
    <!-- <script language="Javascript" src="js/jquery.js"></script>-->

    <!--<script src="js/jquery.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="js/jquery.min.js"></script>

    <script src="js/script.js"></script>

    <script type="text/JavaScript" src="js/state.js"></script>
    <script charset="utf-8" src="js/jquery.dataTables.js"></script>

    <script charset="utf-8" src="js/dataTables.tableTools.js"></script>

    <script charset="utf-8" src="js/familyMemberReport.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery.validate.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

    <!-- Latest compiled and minified Locales -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">


    <script type="text/javascript">
        var userId = '212';

        $(document).ready(function() {
            $.getJSON(baseUrl + 'include/selectUser.php?userId=' + userId + '&pagename=Users', function(data) {
                $.each(data, function(key, cat) {
                    $('#txtPandiName').html(cat.tat);
                });
            });
        });

    </script>

</head>

<body>
    <div class="wrapper">
        <?php require("includes/header.php"); ?>
        <section class="welcomeText pat20">
            <div class="container clearfix">
                <h1 id="newtype">Add Your Family Member Here</h1>
                <p>Give your identity as an member of the family, you can fill all your family members details.</p>
            </div>
        </section>
        <form id="familyForm" name="familyForm" method="post">
            <input type="hidden" id="memberId" name="memberId" value="212">
            <input type="hidden" id="FL_Id" name="FL_Id" value="">
            <section class="clearfix innerData" style="padding-top:0">
                <div class="famHead clearfix">
                    <div class="container">
                        <?php if($_SESSION['utype']=="apstm") { ?>
                        <div id="tatsection">Tat Name: <span id="txtPandiName">Pandi/Tat name</span></div>
                        <?php } ?>
                        <div>Member Name: <span style="text-transform: capitalize;">
                                <?php echo $_SESSION['name']; ?></span></div>
                    </div>
                </div>
                <div class="container">
                    <div class="famMemberData">
                        <div class="form clearfix">
                            <div class="item">
                                <input type="text" name="firstname" id="firstname" placeholder="Name" maxlength="50" onkeypress="isNOTNumberKey(evt);" />
                            </div>
                            <div class="item">
                                <div class="w100">
                                    <select name="relationship">
                                        <option value="">Relation</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Dependent">Dependent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item">
                                <input type="date" placeholder="DOB" name="txtDOB" id="txtDOB" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Mobile" name="txtMobile" id="txtMobile" maxlength="10" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Email ID" name="txtemail" id="txtemail" maxlength="50" />
                            </div>
                            <div class="item">
                                <input type="text" placeholder="Profession" name="txtProfession" id="txtProfession" maxlength="50" />
                            </div>
                            <div class="item btnAdd">
                                <input type="submit" value="Add" name="submit1" />
                            </div>

                        </div>
                        <!--<div class="item ">
                                <input type="submit" value="Submit" />
                            </div>
							-->
                        <div class='resp_code frms'>
                            <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;">
                                <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;" href="http://www.hscripts.com"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>


        <?php 
       if(isset($_POST['submit1'])){
           $date=date('Y-m-d');
       {
           $insert_family="INSERT INTO `familymember`(`sr`, `name`, `relation`, `dateofbirth`, `mobile`, `emailID`, `profession`, `addedBy`, `usertype`, `date`) VALUES ('','$_POST[firstname]','$_POST[relationship]','$_POST[txtDOB]','$_POST[txtMobile]','$_POST[txtemail]','$_POST[txtProfession]','$_SESSION[name]','$_SESSION[utype]','$date')";
           $insert_family_result  = mysqli_query($mysqli,$insert_family); 
       }

       }

?>

        <div class="viewManagerlist">
            <div id="page_container">
                <table id="table_id" data-toggle="table" border="1">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Date of Birth</th>
                            <th>Mobile No.</th>
                            <th>Email Id</th>
                            <th>Profession</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
       $show_member="SELECT * FROM `familymember`" ;
        $show_member_result=mysqli_query($mysqli,$show_member);
         while($row= mysqli_fetch_assoc($show_member_result)){
      
           
        
    ?>
                    <tr>
                        <td>
                            <?php echo $row['sr']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['relation']; ?>
                        </td>
                        <td>
                            <?php echo $row['dateofbirth']; ?>
                        </td>
                        <td>
                            <?php echo $row['mobile']; ?>
                        </td>
                        <td>
                            <?php echo $row['emailID']; ?>
                        </td>
                        <td>
                            <?php echo $row['profession']; ?>
                        </td>
                        <td>
                            <?php echo $row['profession']; ?>
                        </td>
                        <?php } ?>
                    </tr>

                </table>

                <br>
                <div class="reportDate"><label>Date : </label><span id="spandate"></span></div>
            </div>
        </div>

        <?php require("includes/footer.php"); ?>
    </div>
</body>

</html>
