/* vim: set filetype=javascript :
<?php include_once './config.php'; ?>
*/
var svg_started = false;
var my_svg = null;
var row_count = 0;
var col_count = 0;
var hex_width = <?php echo($cfg['hex_width']); ?>;
var hex_height = <?php echo($cfg['hex_height']); ?>;


function get_color() {
	if( palette[current_color] == 'transparent' ) {
		return 'none';
	}
	return palette[current_color];
}
function add_hexagon(parent,x,y,w,h) {
	var hex = my_svg.polygon(parent,
	   	[
			[x + w/2, y],
			[x + w, y + h*0.25],
			[x + w, y + h*0.75],
			[x + w/2, y + h],
			[x, y + h*0.75],
			[x, y + h*0.25]
		],
		{fill:get_color(), stroke:'#ccc', strokeWidth:1}
	);
	if(get_color() == 'none') {
		$(hex).attr('fill-opacity', 0.01);
		$(hex).attr('fill', '#ffffff');
	}
	$(hex).attr('data-color-id', current_color);
	$(hex).click( function() {
		var c = get_color();
		$(this).attr('data-color-id', current_color);
		if( c == 'none' ) {
			$(this).attr('fill-opacity', 0.01);
			$(this).attr('fill', '#ffffff');
		} else {
			$(this).attr('fill-opacity', 1.0);
			$(this).attr('fill', c);
		}
	});
}

function add_row(rowIdx) {
	var row_col_count = col_count;
	var row_shift = 0;
	if(rowIdx % 2 == 1) {
		--row_col_count;
		row_shift = 0.5;
	}
	var row = my_svg.group(null, 'row'+rowIdx);
	for(var colIdx=0; colIdx < row_col_count; ++colIdx) {
		add_hexagon(row,
			(colIdx + row_shift) * hex_width,
			rowIdx * hex_height * 0.75,
			hex_width,
			hex_height
		);
	}
}

function grid_size_in_pixels() {
	return {
		width: col_count * hex_width,
			height: (((row_count - 1) * 0.75) + 1) * hex_height
	};
}

function grid_refresh() {
	if(my_svg == null) return;
	my_svg.clear();
	for(var rowIdx=0; rowIdx<row_count; ++rowIdx) {
		add_row(rowIdx);
	}
	var size = grid_size_in_pixels();
	$('#myImage').css('width', (size.width+1)+'px');
	$('#myImage').css('height', size.height+'px');
}

function grid_create(svg) {
	my_svg = svg;
	grid_refresh();
}

function resize_image(width, height) {
	col_count = width;
	row_count = height;
	if( ! svg_started ) {
		svg_started = true;
		$('#myImage').svg({onLoad:grid_create,initPath:'./ext/jquery.svg.blank.svg'});
		return;
	}
	grid_refresh();
}

function data_svg_to_store() {
	return my_svg.toSVG();
}

function data_to_store() {
	var rows = [];
	var row_objects = $('#myImage g');
	for(var rowIdx=0; rowIdx<row_objects.length; ++rowIdx) {
		var cols = [];
		var col_objects = $('polygon', row_objects[rowIdx]);
		for(var colIdx=0; colIdx < col_objects.length; ++colIdx) {
			cols.push($(col_objects[colIdx]).attr('data-color-id'));
		}
		rows.push( cols.join(',') );
	}
	return '{palette:-1, data:[[' + rows.join('],[') + ']]}';
}

