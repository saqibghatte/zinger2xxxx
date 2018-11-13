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
    <?php require("includes/header.php"); ?>

    <section class="welcomeText pat20">
        <div class="container clearfix">
            <h1>Panch Samittee Members</h1>
        </div>
    </section>
    <section class="clearfix innerData">
        <div class="container members">
            <!--h2>Board of Trustees</h2-->

            <table style="width:100%;">
                <tr bgcolor="#ccc" height="30">
                    <th>Name</th>
                </tr>
                <?php
                $sql="SELECT * FROM `panch_samittee`";
                if($result = $mysqli->query($sql))
                {
                    while ($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>" . $row['name'] . "</td></tr>";
                    } 
                } 
                ?>
            </table>
        </div>
    </section>
    <?php require("includes/footer.php"); ?>
</body>

</html>