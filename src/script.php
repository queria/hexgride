<?php
/* vim: set filetype=javascript : */

	echo("var palette = ['".implode("','", $palette)."'];");
?>

var current_color = 0; //'rgb(255,255,255)';

<?php require './src/scripts/grid.php'; ?>

$(document).ready( function () {


	var hg = new HexGrid(0,0);

	//var i = document.getElementById('myImage'); //$('#myImage');
	var kin = new Kinetic_2d('myImage');
	kin.setDrawStage(function(){
		var ctx = kin.getContext(); //i.getContext('2d');
		hg.paint(kin, ctx);
	});

	<?php require './src/scripts/controls.php'; ?>
});


