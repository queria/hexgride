<?php
/* vim: set filetype=css : */
?>

* {
	font-family: sans-serif;
	font-size: 10pt;
	padding:0px;
	margin:0px;
}

body {
	padding:1em;
	padding-top:5em;
}

#myImage {
	border: 1px solid gray;
}

#tools {
	position:fixed;
	right:6px;
	top:6px;
	background-color:white;
}
.dimensions input {
	text-align:center;
}

#storeString {
	border: 2px ridge green;
	margin: 2px;
	padding: 1em;
	/*white-space:pre;*/
}

.colors .selected {
	display:inline;
}
.colors .selected .color {
	display: inline-block;
	width:1.2em;
	height:1.2em;
	border: 1px solid gray;
}
.colors button {
	border: 1px dotted gray;
	width:1.5em;
	height: 1.5em;
}
.colors button:hover {
	border: 1px solid gray;
}

<?php
include_once './src/palette.php';

for($cIdx=0; $cIdx<count($palette); ++$cIdx) { ?>
	#color<?php echo($cIdx); ?> {
		background-color: <?php echo($palette[$cIdx]); ?>;
	}
<?php
}

if(isset($palette[0])) {
	echo "#tools .colors .selected .color { background-color: {$palette[0]}; }\n";
}
?>

