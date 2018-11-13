<header id="header">
    <script>
        $(document).ready(function() {
            $('header .menu').click(function(event) {
                event.preventDefault();
                $('nav').animate({
                    right: 0
                }, 200);
            });

            $('.close').click(function(event) {

                event.preventDefault();
                $('nav').animate({
                    right: -500
                }, 500);
            });
        });
    </script>

    <div class="container clearfix">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png"><div>Akhil Padmashali Samaj Trust <span>(Mumbai)</span></div></a>
        </div>
        <div class="menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <nav>
            <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
            <div class="navTop clearfix">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <?php if(isLoggedIn()) { ?>
                    <li id="logs"><a href="logout.php">Log Out</a></li>
                    <li class="w100"><a>Welcome  <?php echo $_SESSION['name']; ?></a></li>
                    <?php } else { ?>
                    <li id="logs"><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="navBottom clearfix">
                <ul>
                    <?php if(isLoggedIn()) { ?>
                    <li><a href="myprofile.php">Users Profile</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <li><a href="familymember.php">Family Member</a></li>
                    <li><a href="vadhuVarulaForm.php">Vadhu-Varula Form</a>
                        <a href="viewVadhuVarula.php">Vadhu-Varula View/Edit</a>
                        <a href="matchsearch.php">Vadhu-Varula Search</a>
                    </li>
                    
                    <?php } else { ?>
                    <li><a href="apstmMember.php">APSTM Member (register)</a></li>
                    <li><a href="nonApstm.php">Non-APSTM Member (register)</a></li>
                    <li><a href="others.php">Other (register)</a></li>
                    <?php } ?>
                    
                    <li><a href="migration.php">Migration</a></li>
                    <li><a href="boardoftrustees.php">Board of Trustees</a></li>
                    <li><a href="workingcomitee.php">Working Committee</a></li>
                    <li><a href="subcomiteesachalak.php">Sub-committee Sanchalak</a></li>
                    <li><a href="panchsamitteememers.php">Pancha Samithi Members</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="social.php">Social</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>