<?php
include_once 'classes/Deeplink.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$deeplink = new Deeplink();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/css/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Deeplink Generator</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function copyToClipboard(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
}
</script>
<body>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h1>Deeplink Generator</h1>
				<h4>Beschreibung:</h4>
				<p>Ziel ist es hiermit die Generierung der Kampagnen Links zu automatisieren. Dafür können einfach die passenden Parameter festgelegt werden.</p>
			</div>
			<div class="small-12 cell">
				<form method="POST">
					<div class="grid-x grid-padding-x">
						<div class="small-8 cell">
							<label for="targetPage">Ziel URL</label>
							<input type="text" name="targetPage" id="targetPage" value="<?php echo (isset($_POST['targetPage'])) ? $_POST['targetPage'] : ""; ?>">
						</div>
					</div>
					<div class="grid-x grid-padding-x">
						<div class="small-4 cell">
							<label for="campaignType">Kampagnen Typ</label>
							<select name="campaignType" id="campaignType">
								<option>Display</option>
								<option>Newsletter</option>
								<option>Affiliate</option>
							</select>
						</div>
						<div class="small-4 cell">
							<label for="campaign">Kampagnen Name</label>
							<input type="text" name="campaign" id="campaign" value="<?php echo (isset($_POST['campaign'])) ? $_POST['campaign'] : ""; ?>">
						</div>
						<div class="small-4 cell">
							<label for="addition">Zusatz</label>
							<input type="text" name="addition" id="addition" value="<?php echo (isset($_POST['addition'])) ? $_POST['addition'] : ""; ?>">
						</div>
						<div class="small-4 cell">
							<label for="voucher">Gutscheincode</label>
							<input type="text" name="voucher" id="voucher" value="<?php echo (isset($_POST['voucher'])) ? $_POST['voucher'] : ""; ?>">
						</div>
						<div class="small-1 cell">
							<label for="language">Sprache</label>
							<select name="language" id="language">
								<option>de</option>
								<option>fr</option>
							</select>
						</div>
						<div class="small-4 cell">
							<label for="period">Start der Kampagne</label>
							<input type="date" name="period" id="period" value="<?php echo (isset($_POST['period'])) ? $_POST['period'] : date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<input type="submit" name="generate" value="Generate Deeplink" class="button large float-right">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="small-11 cell">
				<p class="deeplink" id="deeplink">
				<?php
				if (isset($_POST['generate'])) {
					echo $deeplink->run();
				}
				?>
				</p>
				
			</div>
			<div class="small-1 cell">
				<button class="button secondary small float-right" onclick="copyToClipboard('#deeplink')">Copy</button>
			</div>
		</div>
	</div>
</body>
</html>