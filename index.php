<?php
include_once 'classes/Deeplink.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
$deeplink = new Deeplink();
$pageTitle = "Deeplink Generator";
include_once '../_template/head.php';
?>
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
<div class="container">
	<?php include_once '../_template/header.php'; ?>
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h1><?= $pageTitle ?></h1>
			<h4>Beschreibung:</h4>
			<p>Ziel ist es hiermit die Generierung der Kampagnen Links zu automatisieren. Dafür können einfach die passenden Parameter festgelegt werden.</p>
		</div>
		<div class="col-sm-12">
				<form method="post">
					<div class="row mb-3">
						<div class="col-sm-8">
							<label class="form-label" for="targetPage">Ziel URL</label>
							<input class="form-control" type="text" name="targetPage" id="targetPage" value="<?php echo (isset($_POST['targetPage'])) ? $_POST['targetPage'] : ""; ?>">
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-sm-4">
							<label class="form-label" for="campaignType">Kampagnen Typ</label>
							<select class="form-select" name="campaignType" id="campaignType">
								<option>Display</option>
								<option>Newsletter</option>
								<option>Affiliate</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="form-label" for="campaign">Kampagnen Name</label>
							<input class="form-control" type="text" name="campaign" id="campaign" value="<?php echo (isset($_POST['campaign'])) ? $_POST['campaign'] : ""; ?>">
						</div>
						<div class="col-sm-4">
							<label class="form-label" for="addition">Zusatz</label>
							<input class="form-control" type="text" name="addition" id="addition" value="<?php echo (isset($_POST['addition'])) ? $_POST['addition'] : ""; ?>">
						</div>
						<div class="col-sm-4">
							<label class="form-label" for="voucher">Gutscheincode</label>
							<input class="form-control" type="text" name="voucher" id="voucher" value="<?php echo (isset($_POST['voucher'])) ? $_POST['voucher'] : ""; ?>">
						</div>
						<div class="col-sm-1">
							<label class="form-label" for="language">Sprache</label>
							<select class="form-select" name="language" id="language">
								<option>de</option>
								<option>fr</option>
							</select>
						</div>
						<div class="col-sm-4">
							<label class="form-label" for="period">Start der Kampagne</label>
							<input class="form-control" type="date" name="period" id="period" value="<?php echo (isset($_POST['period'])) ? $_POST['period'] : date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-12 col-md-2">
							<input class="form-control btn btn-primary" type="submit" name="generate" value="Generate Deeplink">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row justify-content-end mb-5">
			<div class="col-sm-12 col-md-12">
				<p class="deeplink" id="deeplink">
				<?php
				if (isset($_POST['generate'])) {
					echo $deeplink->run();
				}
				?>
				</p>
				
			</div>
			<div class="col-sm-1 text-end">
				<button class="btn btn-secondary" onclick="copyToClipboard('#deeplink')">Copy</button>
			</div>
		</div>
	</div>
</div>
<?php include '../_template/footer.php'; ?>