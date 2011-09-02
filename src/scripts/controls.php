<?php
/* vim: set filetype=javascript : */
include_once './config.php';
?>

	$('#tools').draggable();
	
	<?php
	// if we have saved_grid we should specify dimensions
	// and prepare data to be loaded by implementation
	if(!empty($saved_grid)) {
	}
	?>
	$('#tools #dimensionsForm').submit( function() {
		resize_image(
			$('#width').val(),
			$('#height').val());
		return false;
	}).submit(); // <------ THIS IS INITAL REPAINT

	$('#tools .colors button').click( function(){
		current_color = $(this).attr('data-color');
		$('#tools .colors .selected .color').css(
			'background-color',
			palette[current_color]);
		$('#tools .colors .selected .color').css(
			'background-image',
			$(this).css('background-image'));
		return false;
	});

	$('#storeLink').click( function(){
		var data = encodeURIComponent(data_to_store());
		<?php if($cfg['use_offline_filesave']) { ?>
			document.location = 'data:text/octet-stream,'+data;
		<?php } else { ?>
			document.location = './save.php?data='+data;
		<?php } ?>
		return false;
	});

	$('#storeSVGLink').click( function(){
		var data = encodeURIComponent(data_svg_to_store());
		<?php if($cfg['use_offline_filesave']) { ?>
			alert('Storing of SVG not implemented using offline/local file save (data:) uri.');
			//document.location = 'data:text/octet-stream,'+data;
		<?php } else { ?>
			$('<form action="./save.php" method="post" enctype="multipart/form-data">'
				+'<input type="hidden" name="svg" value="true" />'
				+'<input type="hidden" name="data" value="'+data+'" />'
			+'</form>').appendTo('body').submit().remove();
			//document.location = './save.php?svg=true&data='+data;
		<?php } ?>
		return false;
	});

