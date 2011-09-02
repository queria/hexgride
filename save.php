<?php
if(!isset($_REQUEST['data'])) {
	die('no data to store - sorry!');
}
$svg = (isset($_REQUEST['svg']) && $_REQUEST['svg']);
if($svg) {
	header('Content-Type:text/octet-stream');
	header('Content-Disposition:attachment;filename=grid.svg');
	// to directly display svg in browser use this instead of upper headers
	// header('Content-Type:image/svg+xml');
	echo urldecode($_REQUEST['data']);
} else {
	header('Content-Type:text/octet-stream');
	header('Content-Disposition:attachment;filename=grid.js');
	echo $_REQUEST['data'];
}
?>
