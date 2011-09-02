<?php
include_once './config.php';
if(isset($_REQUEST['use_svg'])) {
	$cfg['use_svg'] = $_REQUEST['use_svg'] == 'true';
}
include_once './src/palette.php';

?>
<!-- DOCTYPE html -->
<html>
	<head>
		<meta charset="utf-8" />
		<title>HexGrid image editor</title>
		<script src="./ext/jquery.min.js" /></script>
		<script src="./ext/jquery.base64.js" /></script>
		<script src="./ext/jquery-ui-1.8.16.custom.draggable.min.js" /></script>

		<?php if($cfg['use_svg']) { ?>
		<link rel="stylesheet" type="text/css" href="./ext/jquery.svg.css" />
		<script src="./ext/jquery.svg.pack.js" /></script>
		<?php } else { ?>
		<script src="./ext/kinetic2d-v1.0.0-mod.js" /></script>
		<?php } ?>

		<style>
			<?php require './src/style.php'; ?>
		</style>

		<script>
			<?php require './src/script.php'; ?>
		</script>
	</head>
	<body>
		<header>
		<h1>HexGridE</h1>
		<h2>Online hex grid editor</h2>
		</header>
		<?php if($cfg['use_svg']) { ?>
			<div id="myImage"></div>
		<?php } else { ?>
			<canvas id="myImage" width="400" height="400">
			</canvas>
		<?php } ?>
		<div id="tools">
			<div class="colors">
				<div class="selected">
					Current color: <div class="color">&nbsp;</div>
				</div>
				<div>
				Palette:
				<?php for($cIdx=0; $cIdx<count($palette); ++$cIdx) { ?>
					<button id="color<?php echo($cIdx); ?>" data-color="<?php echo($cIdx); ?>">&nbsp;</button>
				<?php } ?>
				</div>
			</div>
			<form id="dimensionsForm">
				<div id="dimensions">
					Dimension: <input type="text" id="width" value="<?php echo($cfg['default_width']); ?>" size="4" /><label for="width"> wide</label>
					&times; <input type="text" id="height" value="<?php echo($cfg['default_width']); ?>" size="4" /><label for="height"> tall</label>
					&rarr; <input type="submit" class="button" value="Resize" id="resizeBtn" />
				</div>
			</form>
			<div id="saveLoad">
				<a href="#" id="storeLink">Save grid</a>
				<?php if($cfg['use_svg']) { ?>or <a href="#" id="storeSVGLink">Export SVG</a><?php } ?>
				<form action="./" method="post">
					<input type="file" name="saved_grid" />
					<input type="submit" class="button" value="Load grid" />
				</form>
			</div>

			<div id="exports">
				Switch to 
				<?php
				if($cfg['use_svg']) {
					echo '<a href="?use_svg=false">HTML5Canvas (old)</a>';
				} else {
					echo '<a href="?use_svg=true">SVG (new)</a>';
				}
				?>
				version.
			</div>
			<div class="note">
				Notes:<br />
				&bull; You can drag this toolbar up and down<br />
				&bull; Dont use too big image area ... <br />
					&nbsp; &nbsp; more than 200x200 can be very slow<br />
				&bull; You can try SVG (faster) or Canvas implementations<br />
				&bull; At the moment resizing always clear whole image<br />
				&bull; Resizing will repaint whole area with current color<br />
				&bull; I think it doesn't work in IE ... you can fix it yourself<br />
				&bull; Everyone can grab <a href="http://github.com/queria/hexgride">sources at github</a><br />
				&bull; <strong>Loading</strong> of saved grid <strong>does not work</strong> yet<br />
			</div>
		</div>
		<footer>
		Created by <a href="http://sa-tas.net/">Queria Sa-Tas</a> @ 2011
		</footer>
	</body>
</html>
