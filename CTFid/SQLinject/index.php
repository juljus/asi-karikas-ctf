<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kukeseene Market - Kontoseis</title> <!-- leht et vaadata oma kontoseisu interneti populaarseimal kukeseene turul --> 
	<style>
		body {
			background-color: #a87507;
			display: flex;
			justify-content: center;
			align-items: center;
			#height: 100vh;
			font-family: Arial;}

		.sisse-logimine {
			background: #644605;
			padding: 30px;
			border-radius: 10px;
			text-align: center;
			width: 400px;
			box-shadow: 10px 10px 15px #533a05;}

		input {
			width: 100%;
			padding: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 4px;
			background: #7b622c;
			color: white;}

		.nupp {
			width: 100%;
			padding: 10px;
			background:  #d37605;
			border-radius: 4px;
			border: none;
			color: white;
			font-size: 16px;
			cursor: pointer;}
		nupp:hover {background: #d35c05;}
		
		.text {
			margin-top: 10px;
			margin-bottom: 15px;
			color: #bdc3c7;
			font-size: 20px;
		}
		.tx1 {
			margin-top: 25px;
			margin-bottom: 10px;
			color: #bdc3c7;
			font-size: 20px;}
		h3 {
			margin-top: 5px;
			margin-bottom: 10px;
			color: #bdc3c7;
			font-size: 20px;}
		.flag{
			margin-top: 25px;
			margin-bottom: 10px;
			font-size: 30px;
			animation: blink 0.5s infinite;
		}
		@keyframes blink {
            0% {color: red;}
            33% {color: green;}
			66% {color: blue;}
		}
	</style>
</head>
<body>
	<span class="sisse-logimine">
		<h3>Kukeseene Market - Kontojääk</h3>
		<form method="GET" action="index.php">
			<input type="text" id="username" name="username" placeholder="Kasutajanimi">
			<input type="password" id="password" name="password" placeholder="Salasõna">
			<button type="submit" class="nupp">Kontrolli kontojääki</button>
		</form>
		<?php
		// võlts andmebaasid. Üks mis tuleb injectiga välja (users0) ja üks mis on kasutusel muidu (users)
		// simuleerib seda et kasutaja sisselogimise andmed ja kontoseis jms on eraldi andmebaasis
		// tuleb leida asi karika konto ja sellega sisse logida et saada kontoseis mis on ka flag
		// andmed on ka muidugi krüpteerimata
		$users0 = [["id" => 1, "username" => "administraator", "password" => "12qwert34yuiop56"],
					["id" => 2, "username" => "ristoriisikas", "password" => "kallisMalle45"],
					["id" => 3, "username" => "juhan67", "password" => "mulgipuder1967"],
					["id" => 4, "username" => "malleriisikas", "password" => "1980Endla12"],
					["id" => 5, "username" => "ASI_KARIKAS", "password" => "EHK_KONTOJ22K_ON_FLAG???"],
					["id" => 6, "username" => "miguel3", "password" => "awfaawgawgwag:q!"],
					["id" => 7, "username" => "kerstike55", "password" => "rullbiskv11t"]];
		$users = [["id" => 1, "username" => "administraator", "password" => "12qwert34yuiop56", "balance" => "9999999"],
					["id" => 2, "username" => "ristoriisikas", "password" => "kallisMalle45", "balance" => "15"],
					["id" => 3, "username" => "juhan67", "password" => "mulgipuder1967", "balance" => "678"],
					["id" => 4, "username" => "malleriisikas", "password" => "1980Endla12", "balance" => "-13"],
					["id" => 5, "username" => "ASI_KARIKAS", "password" => "EHK_KONTOJ22K_ON_FLAG???", "balance" => "1337"],
					["id" => 6, "username" => "miguel3", "password" => "awfaawgawgwag:q!", "balance" => "567900"],
					["id" => 7, "username" => "kerstike55", "password" => "rullbiskv11t", "balance" => "203"]];

		$username = $_GET['username'] ?? '';
		$password = $_GET['password'] ?? '';

	// fake sql inject ja sisse logimine parooliga
		// näiteks tehakse selline query, et võtta selle nime ja parooliga kasutaja andmed andmebaasist, või vaadata kas neid üldse on olemas: 
		//SELECT * FROM users WHERE username = '$username' AND password = '$password'
		if (preg_match("/['\"] OR 1=1 --.*/i", $username) === 1) { // simuleeritud SQL inject
			$username = "<pre>" . json_encode($users0, JSON_PRETTY_PRINT) . "</pre>";
			echo "<div class=\"tx1\">Sisse logitud kasutajana <b>$username</b>!</div>";} // Justkui hakkaks kasutaja nime trükkima aga inject rikub selle ära ja väljastab andmed 
		else{ // korrektne sisselogimine kasutajanime ja parooliga 
			foreach ($users as $user) {
				if ($user['username'] === $username && $user['password'] === $password) { 
					$bal;
					foreach ($users as $user) { if ($user['username'] === $username){
							$bal = (int)$user['balance']; }};
					if($username === "ASI_KARIKAS"){
						echo "<div class=\"flag\"><b>CTF_FLAG_LEITUD_!!!</b></div>";
					}
					else{
						echo "<div class=\"tx1\">Sisse logitud kasutajana <b>$username</b>!<br> Sinu kontojääk on <b>$bal</b> eurot.</div>";
					}
					exit; 
				}
			}
			if ($username != "") {echo "<div class=\"tx1\">Kasutajat ei leitud!</div>";}}
		?>
	</span>
</body>
</html>


