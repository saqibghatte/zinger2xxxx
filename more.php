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
      <?php require("includes/header.php"); ?>
      <br><br>
	  
	  <!-------- 1. TITLE / SLIDER / ARTICLE MORE TAB -------->
	  <?php if(isset($_GET['title'])||isset($_GET['slider'])||isset($_GET['article'])) { ?>
      <section class="welcomeText">
         <div class="container clearfix">
            <style type="text/css">
               #box1	{ 
               border:0px solid #000;
               background:;
               margin-right:260px;
               width:250px;
               }
               #box2 	{
               float:right;
               background:;
               border:0px solid #000;
               width:70%;
               text-align: justify;
               text-justify: inter-word;
               }
            </style>
            <div id="container">
               <div id="box2">
					<?php
					$title = "";
					$content = "";
					$image = "";
					if(isset($_GET['title'])&&is_numeric($_GET['title'])) 
					{
						$table = "title";
						$id = secure($_GET['title']);
					}
					elseif(isset($_GET['slider'])&&is_numeric($_GET['slider'])) 
					{
						$table = "slider";
						$id = secure($_GET['slider']);
					}
					elseif(isset($_GET['article'])&&is_numeric($_GET['article'])) 
					{
						$table = "articles";
						$id = secure($_GET['article']);
					}
					
					$sql="SELECT * FROM `$table` WHERE `sr` = $id";
					if($result = $mysqli->query($sql))
					{
						while ($row = $result->fetch_assoc())
						{ 
							$title = $row['title'];
							$content = $row['content'];
							$image = $row['image'];
						}
					}
					
					echo "<br><br>" . $content;
					?>
               </div>
               <div id="box1">
                  <img width="250" height="250" src="img/home/<?php echo $image; ?>">
                  <h2> <font color="#ff6c87"><?php echo $title; ?></font></h2>
               </div>
            </div>
         </div>
      </section>
	  <?php } ?>
	  
	  
	  <!-------- 2. SERVICES MORE TAB -------->
	  <?php if(isset($_GET['service'])&&is_numeric($_GET['service'])) {
	  $id = secure($_GET['service']);
	  $sql="SELECT * FROM `services` WHERE `sr` = $id";
	  if($result = $mysqli->query($sql))
	  {
		while ($row = $result->fetch_assoc())
		{
			$title = $row['title'];
			$content = $row['content'];
			$image = $row['image'];
		?>
	  <section class="welcomeText">
        <div class="container clearfix">
		<br><?php echo $content; ?><br><br><br>
		
		<h2 align="justify"style="color:#ff6c87;"><?php echo $title; ?> Archives</h2><br>
		<hr><br>
	  <?php } } 
	  $sql="SELECT * FROM `articles` WHERE `servicesID` = $id";
	  if($result = $mysqli->query($sql))
	  {
		while ($row = $result->fetch_assoc())
		{
	  ?>
		<h2 align="justify">
		<a href="more.php?article=<?php echo $row['sr']; ?>"><img width="150px"src="img/home/<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff6c87"><?php echo $row['title']; ?></font></a>
		</h2>
		<hr><br>
          </div>
       </section>
	  <?php } } 
	  } ?>
   </body>
</html>