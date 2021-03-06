<?php
include('./include/db.php');
$conn = new mysqli($servername, $username, $password, 'ukus_content');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
$menu = $conn->query('SELECT ID, text, link FROM mainmenu');
?>
<head>
	<title>Restoran 'UKUS' - Rezervacije</title>
	<script src="jQuery.js"></script>
	<link rel="stylesheet" type="text/css" href="defaultStyles.css">
    <link rel="stylesheet" type="text/css" href="reservationStyles.css">
	<link href='https://fonts.googleapis.com/css?family=Catamaran:800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<div id="page">
	<div id="mainMenu">
		<div id="nav">
            <?php if ($menu->num_rows > 0) {
                while ($row = $menu->fetch_assoc()) {?>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; echo "/"; echo $row["link"];?>"><button class="mainBtn"><?php echo $row["text"];?></button></a><?php
                }
            }?>
		</div>
	</div>
	<div id="header" style="height: 250px;">
		<img src="./img/header.png" id="combinedPicture" class="headerImage" style="height: 250px;">
		<div id="mask" style="margin-top: -89px;"><img src="./img/sliderlogo.png"></div>
	</div>
	<div id="mainContent" >
		<h2 class="subHeader" style="margin-left: 20px;">Rezervacije</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>Odaberite datum:<input type="date" name="date" id="customersDate" value="2015-02-09"/></p>
            <p>Odaberite vrijeme: <select id="customersHour" name="hour"><?php for($i = 0;$i < 24; $i++) echo "<option value=".$i.">".$i."</option>"; ?></select>
				<select id="customersMinute" name="minutes"><?php for($i = 0;$i < 60; $i++) echo "<option value=".$i.">".$i."</option>"; ?></select></p>
            <p>Unesite Vaše ime: <input id="customersName" name="name" placeholder="Vaše ime"/></p>
            <p>Unesite Vaše prezime: <input id="customersSurname" name="surname" placeholder="Vaše prezime"/></p>
            <p>Za koliko osoba: <input id="customersNumber" name="number" placeholder="Broj osoba" type="number" min="1" max="30" /></p>
            <p>Unesite broj Vašeg telefona: <input id="customersPhone" name="phone" placeholder="Vaš kontakt telefon"/></p>
            <textarea id="customersNote" name="note" placeholder="Dodatni zahtjevi..."></textarea>
            <br><br>
            <input  type="submit" value="Proslijedi"/>
        </form>
        <?php
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = test_input($_POST["date"]);
            $hour = test_input($_POST["hour"]);
            $minutes = test_input($_POST["minutes"]);
            $name = test_input($_POST["name"]);
            $surname = test_input($_POST["surname"]);
            $number = test_input($_POST["number"]);
            $phone = test_input($_POST["phone"]);
            $note = test_input($_POST["note"]);
            $sql = "INSERT INTO reservation (ID, phone, hour, minutes, name, surname, number, phone, note)
                    VALUES (NULL, '$date', '$hour', '$minutes', '$name', '$surname', '$number', '$phone', '$note')";
            $conn->query($sql);
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
		<footer id="footer">
			<p>
				<b>footer footer footer footer footer footer<br>footer footer footer footer footer footer<br>footer footer footer footer footer footer<br>Bakir Brkic, Oktobar, 2015.<br></b>
			</p>
		</footer>
	</div>
</div>
</body>