<?php
require_once('./include/db.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");
$news = $conn->query('SELECT ID, title, text, subtitle, subtext, img_path, img_alt, date FROM news');
$menu = $conn->query('SELECT ID, text, link FROM mainmenu');
$domain = $_SERVER['SERVER_NAME'];
$conn->close();
?>
<head xmlns="http://www.w3.org/1999/html">
	<title>Restoran 'UKUS' - Početna</title>
	<script src="jQuery.js"></script>
	<script src="owl-carousel/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="owl-carousel/owl.transitions.css">
	<link rel="stylesheet" type="text/css" href="defaultStyles.css">
	<link href='https://fonts.googleapis.com/css?family=Catamaran:800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<div id="page">
		<div id="mainMenu">
			<div id="nav">
                <?php if ($menu->num_rows > 0) {
                    while ($row = $menu->fetch_assoc()) {?>
                    <a href="http://<?php echo $domain; echo "/"; echo $row["link"];?>"><button class="mainBtn"><?php echo $row["text"];?></button></a><?php
                    }
                }?>
			</div>
		</div>
		<div id="header">
            <div id="header-slider" class="owl-carousel clearfix">
                <div ><img class="headerImage" src="./img/head1.jpg" ></div>
                <div ><img class="headerImage" src="./img/head2.jpg" ></div>
                <div ><img class="headerImage" src="./img/head3.jpg" ></div>
            </div>
            <div class="mask" style="margin-top: -89px;"><img src="./img/logo3.png" width="150px"></div>
					<!--<div id="headerNav">
				<button class="headerBtn" id="header1"></button>
				<button class="headerBtn" id="header2"></button>
				<button class="headerBtn" id="header3"></button>-->
		</div>
		<div id="mainContent">
		<?php if ($news->num_rows > 0) {
			while ($row = $news->fetch_assoc()) {?> 
				<div id="article<?php echo $row["ID"];?>" class="article">
				<h1 class="header"><?php echo $row["title"];?></h1>
				<div class="line"></div>
				<p class="articleText"><?php echo $row["text"];?></p>
				<h2 class="subHeader"><?php echo $row["subtitle"];?></h2>
				<img src="<?php echo $row["img_path"];?>" height="150px" alt="<?php echo $row["img_alt"];?>" class="contImage">
				<p class="articleText"><?php echo $row["subtext"];?>
				</div><?php
			}
		}?>
			<footer id="footer">
				<p>
				<b>footer footer footer footer footer footer<br>footer footer footer footer footer footer<br>footer footer footer footer footer footer<br>Bakir Brkic, Oktobar, 2015.<br></b>
				</p>
			</footer>
            <script>
                $("#header-slider").owlCarousel({

                    navigation : false, // Show next and prev buttons
                    autoPlay : true,
                    slideSpeed : 300,
                    singleItem : true,
                    pagination : false,
                    transitionStyle : "fadeUp"
                });
            </script>
		</div>
	</div>
</body>
