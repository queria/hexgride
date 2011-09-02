/* vim: set filetype=javascript :
<?php include_once './config.php'; ?>
*/

function Hexagon (x,y, width, height) {
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	this.color_id = current_color;

	this.paint = function (kin, ctx) {
		var w = this.width;
		var w2 = this.width/2;
		var w4 = this.width/4;
		var h = this.height;
		var h2 = this.height/2;
		var h4 = this.height/4;

		kin.beginRegion();
		ctx.beginPath();
		ctx.moveTo(this.x + w2, this.y);
		ctx.lineTo(this.x + w, this.y + h4);
		ctx.lineTo(this.x + w, this.y + 3*h4);
		ctx.lineTo(this.x + w2, this.y + h);
		ctx.lineTo(this.x, this.y + 3*h4);
		ctx.lineTo(this.x, this.y + h4);
		ctx.closePath();
		var hex = this;
		kin.addRegionEventListener('onmouseup', function(e){
			hex.color_id = current_color;
			//var msg = '';
			//for(var i in this) {
			//	msg += i+'='+this[i]+' ';
			//}
			//alert('me? '+msg);
		});
		kin.closeRegion();
		ctx.fillStyle = palette[this.color_id]; //"rgb(255,0,0)";
		ctx.fill();
		ctx.stroke();
	};
};

function HexGrid(width,height) {
	this.hex_width = <?php echo($cfg['hex_width']); ?>;
	this.hex_height = <?php echo($cfg['hex_height']); ?>;
	this.hexes = [];

	this.width = 0;
	this.height = 0;

	this.row_height_px = this.hex_height * 0.75;

	this.resize(width, height);
}
HexGrid.prototype.size_in_pixels = function(){
	return {
		'width':(this.width * this.hex_width),
		'height':(((this.height - 1) * 0.75) + 1) * this.hex_height// * 0.77)
	};
};
HexGrid.prototype.get_hex_position = function(rowIdx, colIdx) {
	var row_shift = 0;
	if( rowIdx % 2 == 1 ) {
		// odd rows are shifted by half of the hexagon to the right
		row_shift = 0.5;
	}
	return {
		'x':((colIdx + row_shift) * this.hex_width),
		'y':(rowIdx * this.row_height_px)
	};
};
HexGrid.prototype.add_hex = function(rowIdx, colIdx) {
	var pos = this.get_hex_position(rowIdx, colIdx);
	var hex = new Hexagon(
		pos.x,
		pos.y,
		this.hex_width,
		this.hex_height);

	this.hexes[rowIdx][colIdx] = hex;
};
HexGrid.prototype.add_row = function(rowIdx) {
	this.hexes[rowIdx] = [];
	var row_width = this.width; 
	if( rowIdx % 2 == 1 ) {
		// odd rows contains one hexagon less
		--row_width;
	}

	for(var colIdx=0; colIdx<row_width; ++colIdx) {
		this.add_hex(rowIdx, colIdx);
	}
};
HexGrid.prototype.resize = function(width, height) {
	this.hexes = [];
	this.width = width;
	this.height = height;
	for(var rowIdx=0; rowIdx<this.height; ++rowIdx) {
		this.add_row(rowIdx);
	}
};
HexGrid.prototype.paint = function(kin, ctx) {
	//ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
	kin.clear();
	for(var rowIdx=0; rowIdx < this.hexes.length; ++rowIdx) {
		var row = this.hexes[rowIdx];
		for(var colIdx=0; colIdx < row.length; ++colIdx) {
			row[colIdx].paint(kin, ctx);
		}
	}
};
HexGrid.prototype.dumpToStr = function() {
	var rows = [];
	for(var rowIdx=0; rowIdx < this.hexes.length; ++rowIdx) {
		var cols = [];
		for(var colIdx=0; colIdx < this.hexes[rowIdx].length; ++colIdx) {
			cols.push(this.hexes[rowIdx][colIdx].color_id);
		}
		rows.push( cols.join(',') );
	}
	return '[' + rows.join("],\n[") + ']';
};

/*
	function ImageLoader(totalImageCount, finishedCallback) {
		this._finished_callback = finishedCallback;
		this._remaining_images = totalImageCount;
	}
	ImageLoader.prototype.loadImage = function (image, source) {
		image.oImageLoader = this;
		image.onload = ImageLoader.prototype._loaded;
		image.src = source;
	};

	ImageLoader.prototype._loaded = function() {
		if(--this.oImageLoader._remaining_images == 0) {
			this.oImageLoader._finished_callback();
		}
	};
	// example usage:
		var img = new Image();
		var loadImages = function () {
			var loader = new ImageLoader(1, imagesLoaded);
			loader.loadImage(img, './hexagon.png');
		}

		var imagesLoaded = function(){
			ctx.drawImage(img,0,0);
		};

		loadImages();
*/

