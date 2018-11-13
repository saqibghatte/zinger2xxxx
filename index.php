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

    <meta name="chromesniffer" id="chromesniffer_meta" content="{&quot;jQuery&quot;:&quot;1.12.0&quot;}">
    <script type="text/javascript" src="chrome-extension://fhhdlnnepfjhlhilgmeepgkhjmhhhjkh/js/detector.js"></script>
</head>

<body>
   <?php require("includes/header.php");
    if(isLoggedIn())
    {
          header("Location:dashboard.php");
    }
    ?>
    <br><br>
    <?php
    $sql="SELECT * FROM `title`";
    if($result = $mysqli->query($sql))
    {
    while ($row = $result->fetch_assoc())
    {
    ?>
    
    <section class="welcomeText">
        <div class="container clearfix">
            <h1><?php echo $row['title']; ?></h1>
            <?php echo $row['content']; ?>
            <div><a href="more.php?title=<?php echo $row['sr']; ?>">Read More</a></div>
        </div>
    </section>
	<br>
    <?php }
    }
    ?>
    <br><br>
    lkhgfdkjghfdkgjhdfkjgfwewewew
    <section class="homeBanner clearfix">
        <div class="container">
            <?php
            $sql="SELECT * FROM `slider` ORDER BY sr DESC LIMIT 2";
            if($result = $mysqli->query($sql))
            {
				$sliderclass="left";
            while ($row = $result->fetch_assoc())
            { 
            ?>
            <div class="<?php echo $sliderclass; ?>">
                <img src="img/home/<?php echo $row['image']; ?>">
                <span class="note">
                    <a href="more.php?slider=<?php echo $row['sr']; ?>"><font color="white"><p><?php echo $row['title']; ?><br></p></font></a>
               </span>
            </div>
            <?php $sliderclass = "right"; } 
            }
            ?>
        </div>
    </section>

    <section class="services clearfix">
        <div class="container ">
            <h2>Some our recent services provided absolutely free of cost for our society members, We are proud to Announce we are self sufficient and self relient
            </h2>
            <ul>
				<?php
				$sql="SELECT * FROM `services`";
				if($result = $mysqli->query($sql))
				{
					$sliderclass="left";
				while ($row = $result->fetch_assoc())
				{ 
				?>
                <li>
                    <div class="item">
                        <img src="img/home/<?php echo $row['image']; ?>">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['content']; ?></p>
                        <a href="more.php?service=<?php echo $row['sr']; ?>">Read More</a>
                    </div>
                </li>
				<?php } } ?>
<!--
                <li>
                    <div class="item">
                        <div class="img">
                            <div>
                                <input type="text" placeholder="Enter Surname" />
                                <input type="submit" value="FIND NOW" />
                            </div>
                        </div>
                        <h3>Find your Gothram</h3>
                        <p>Interactive tool help you to<br> find your Gothram, which will be <br>used while offering Archana’s to God</p>
                        <a href="">Read More</a>
                    </div>
                </li>
-->
            </ul>
        </div>
    </section>
    <script>
    $('.welcomeText').each(function() {
            $(this).find('p:not(:first)').hide()
    });
    </script>
    <?php require("includes/footer.php"); ?>
</body>
</html>