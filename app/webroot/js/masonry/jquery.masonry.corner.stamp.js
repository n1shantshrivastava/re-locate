	  // Masonry corner stamp modifications-------------------------
	  $.Mason.prototype.resize = function() {
	    this._getColumns();
	    this._reLayout();
	  };
	  
	  $.Mason.prototype._reLayout = function( callback ) {
	    var freeCols = this.cols;
	    if ( this.options.cornerStampSelector ) {
	      var $cornerStamp = this.element.find( this.options.cornerStampSelector ),
	          cornerStampX = $cornerStamp.offset().left - 
	            ( this.element.offset().left + this.offset.x + parseInt($cornerStamp.css('marginLeft')) );
	      freeCols = Math.floor( cornerStampX / this.columnWidth );
	    }
	    // reset columns
	    var i = this.cols;
	    this.colYs = [];
	    while (i--) {
	      this.colYs.push( this.offset.y );
	    }
	
	    for ( i = freeCols; i < this.cols; i++ ) {
	      this.colYs[i] = this.offset.y + $cornerStamp.outerHeight(true);
	    }
	
	    // apply layout logic to all bricks
	    this.layout( this.$bricks, callback );
	  };
	//------------------------------------------------------------------------------ 