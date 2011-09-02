<?php
/* vim: set filetype=javascript : */
include_once './config.php';
?>

	$('#tools #dimensions').submit( function() {
		hg.resize(
			$('#width').val(),
			$('#height').val());
		var size = hg.size_in_pixels();
		$('#myImage').attr('width', size.width);
		$('#myImage').attr('height', size.height);
		//hg.paint(kin, ctx);
		kin.drawStage();
		return false;
	}).submit();

	$('#tools .colors button').click( function(){
		current_color = $(this).attr('data-color');
		$('#tools .colors .selected .color').css(
			'background-color',
			palette[current_color]);
		return false;
	});

	$('#storeLink').click( function(){
		<?php if($cfg['use_offline_filesave']) { ?>
			document.location = 'data:text/octet-stream,'+encodeURIComponent(hg.dumpToStr());
		<?php } else { ?>
			alert('real file save via server request not implemented yet sorry!');
		<?php } ?>
		return false;
	});
