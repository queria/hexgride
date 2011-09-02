<?php
/* vim: set filetype=javascript : */
include_once './config.php';

echo("var palette = ['".implode("','", $palette)."'];");
?>

var current_color = 0; //'rgb(255,255,255)';

<?php if( ! $cfg['use_svg'] ) {
	include './src/scripts/grid.php';
}
 ?>

$(document).ready( function () {

<?php if($cfg['use_svg']) {
	include './src/scripts/grid_svg.php';
} else { ?>
	var hg = new HexGrid(0,0);

	//var i = document.getElementById('myImage'); //$('#myImage');
	var kin = new Kinetic_2d('myImage');
	kin.setDrawStage(function(){
		var ctx = kin.getContext(); //i.getContext('2d');
		hg.paint(kin, ctx);
	});

	function data_to_store() {
		return '{palette:-1, data:'+hg.dumpToStr()+'}';
	}

	function resize_image(width, height) {
		hg.resize(width, height);
		var size = hg.size_in_pixels();
		$('#myImage').attr('width', size.width);
		$('#myImage').attr('height', size.height);
		kin.drawStage();
	}

<?php } ?>
	<?php require './src/scripts/controls.php'; ?>
});


