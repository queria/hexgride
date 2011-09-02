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
}

a {
	color: blue;
	text-decoration:none;
}
a:hover { text-decoration:underline; }

header {
}
h1 {
	font-size:12pt;
	color:green;
}
h2 {
	font-size:8pt;
	font-style:italic;
	color:gray;
	padding-left:1em;
}
footer {
	text-align:right;
}
footer, footer a {
	font-size:6pt;
	color:#555;
}
footer a {
	color:#333;
}

#myImage {
	border: 1px solid gray;
	background-image: url('./ext/none.png');
}

#tools {
	position:fixed;
	right:6px;
	top:6px;
	border: 1px dashed #ccc;
	border-right: 3px double #ccc;
	padding:1em;
	background-color:white;
}

#tools .button {
	background-color: white;
	color: black;
}
#tools .note {
	font-size:8pt;
	color:#333;
}
#colors, #dimensions, #saveLoad, #exports, .note {
	margin-top:0.5em;
}
#dimensions input {
	text-align:center;
}

#storeString {
	border: 2px ridge green;
	margin: 2px;
	padding: 1em;
	/*white-space:pre;*/
}

.colors .selected {
}
.colors .selected .color {
	display: inline-block;
	width:1.2em;
	height:1.2em;
	border: 1px solid gray;
	background-image: url('./ext/none.png');
}
.colors button {
	border: 1px dotted gray;
	width:1.5em;
	height: 1.5em;
	background-image: url('./ext/none.png');
}
.colors button:hover {
	border: 1px solid gray;
}

<?php
include_once './src/palette.php';

for($cIdx=0; $cIdx<count($palette); ++$cIdx) {
	if($palette[$cIdx] == 'transparent') continue;
?>

	#color<?php echo($cIdx); ?> {
		background-color: <?php echo($palette[$cIdx]); ?>;
		background-image: none;
	}
<?php
}

if(isset($palette[0])) {
	if($palette[0] != 'transparent') {
		echo "#tools .colors .selected .color { background-color: {$palette[0]}; background-image:none; }\n";
	}
}
?>

