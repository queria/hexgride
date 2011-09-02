<?php
include_once './src/palette.php';

?>
<!-- DOCTYPE html -->
<html>
	<head>
		<meta charset="utf-8" />
		<title>HexGrid image editor</title>
		<script src="./ext/jquery.min.js" /></script>
		<script src="./ext/jquery.base64.js" /></script>
		<script src="./ext/kinetic2d-v1.0.0-mod.js" /></script>
		<style>
			<?php require './src/style.php'; ?>
		</style>
		<script>
			<?php require './src/script.php'; ?>
		</script>
	</head>
	<body>
		<canvas id="myImage" width="400" height="400">
		</canvas>
		<div id="tools">
			<div class="colors">
				Palette:
				<?php for($cIdx=0; $cIdx<count($palette); ++$cIdx) { ?>
					<button id="color<?php echo($cIdx); ?>" data-color="<?php echo($cIdx); ?>">&nbsp;</button>
				<?php } ?>
				<div class="selected">
					Current color: <div class="color">&nbsp;</div>
				</div>
			</div>
			<form id="dimensions">
				Dimension: <input type="text" id="width" value="<?php echo($cfg['default_width']); ?>" size="4" /><label for="width"> wide</label>
				&times; <input type="text" id="height" value="<?php echo($cfg['default_width']); ?>" size="4" /><label for="height"> tall</label>
				&rarr; <input type="submit" value="Resize" id="resizeBtn" />
			</form>
			<div>
				<a href="#" id="storeLink">Save grid</a>
			</div>
		</div>
	</body>
</html>
