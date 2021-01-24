<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email Verifier Tool</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" >
	<link rel="stylesheet" href="Lib/style.css">
	<script src="Lib/js/jquery.js"></script>
	<script src="Lib/js/exec.js"></script>
	<script src="Lib/js/feature.js"></script>
</head>
<body>
<header>
	<center>
		<div class="stats"><br>
			<font size="6" color="white" style="text-shadow: lime 0 0 15px;"><b>*** Email Verifier Tool ***</b></font><br><br>
			<font size="5" color="white" style="text-shadow: lime 0 0 15px;"><b><a href="https://shopytops.com/" target="_blank" style="text-decoration:none;">*** Credits by Shopytops.com ***</a></b></font><br><br>
			<font size="4" color="white" style="text-shadow: lime 0 0 15px;"><b><a href="https://shopytops.com/" target="_blank" style="text-decoration:none;">*** Visit us if you need Genuine G-Suite & Office 365 for Enterprise ***</a></b></font><br><br>
		</div>
	</center>
</header>
<div id="form-container">
	<div id="form-centered">
		<center>
			<span id="listempass">Enter Your Email List To Check (<b id="mailistLength"></b>)</span>
				<div>
					<br>
					<textarea name="empass" id="empass" placeholder="Please Put Your Email List Here (One Email Per Line - 3,000 Line Limit)" onkeyup="getMailistLength()"></textarea>
					<br>
					<select name="ratio" id="ratio" style="display:none;">
						<option value="3000">100%</option>
						<option value="2300">80%</option>
						<option value="1500">50%</option>
						<option value="750" selected>35%</option>
						<option value="650">25%</option>
						<option value="600">20%</option>
						<option value="400">15%</option>
						<option value="370">13%</option>
						<option value="200">10%</option>
						<option value="170">8%</option>
						<option value="140">7%</option>
					</select>
					<a href="https://shopytops.com/" target="_blank" rel="noreferrer noopener" style="text-decoration:none;"><button id="start-button">Start</button></a>&nbsp;&nbsp;&nbsp;<a href="https://shopytops.com/" target="_blank" rel="noreferrer noopener" style="text-decoration:none;"><button id="stop-button">Stop</button></a>
					<div id="proc-send"  style="display: none; margin-top: 10px;">
						<img src="https://static.wixstatic.com/media/90541a_0f30cc38e553438b9602c278cd37c7ea~mv2.gif" alt="Loading..." style="width: 200px;">
					</div>
				</div>
		</center>
	</div>
</div>
<div id="result-container" style="display: none;">
<div id="result-live">
<span id="result-live-note" class="copier" onclick=selectText('live_res') title="Select All Emails">Click to Select All (<i id="berapaLive"></i>)</span>
<fieldset id="live_res" class="results"></fieldset>
</div>
<div id="result-invalid">
<span id="result-invalid-note" class="copier" onclick=selectText('invalid_res') title="Select All Emails">Click to Select All (<i id="berapaInvalid"></i>)</span>
<fieldset id="invalid_res" class="results"></fieldset>
</div>
</div>
</body>
</html>