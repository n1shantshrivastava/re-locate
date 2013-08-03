
$(document).ready(function(){
	  
    $(function(){
	  	
		$('#circleBox').hide();
				  
		$('.objectBoxPHP').masonry({
			// options
			itemSelector : '.object',
			columnWidth: 10,
			cornerStampSelector: ''
		});
		
		$('#circleBox').masonry({
			// options
			itemSelector : '.object',
			columnWidth: 10,
			cornerStampSelector: '.corner-stamp'
		});

		//genericAdd("Object Title","Object Image URL","URL linked to Object");
		
		displayObjectsFromDatabase('objectBoxPHP');
	});
    
    function displayObjectsFromDatabase(objectId) {
//        console.log('displayObjects method called');

    	$.each(objectDatabase, function(i, v) {
			genericAdd(objectId, v.title,v.image,v.url);
		});		
    }
	
//    $(".corner-stamp").mouseover(function(){
//
//    });
    
//	$("#add_box").click(function(e){
//		  createNewObject(e.pageX,e.pageY);
//	});
	  
	$("#show_all").click(function(e){
		$('#circleBox').hide();
		$('#objectBoxPHP').show();
		displayObjectsFromDatabase('objectBoxPHP');
	});
	
//	function cancelButtonClicked() {
//		//$("#add_container").hide();
//		$("#add_container").remove();
//	}
//

	function createNewObject(x,y) {
		//alert(x+" "+y);
//		var br = $("<br/>");
//		var title_div = $("<div style='text-align:left; font-size:10px; margin:2px;'>&nbsp;&nbsp;Object Title *<br/><input type='text' id='object_title' /></div>");
//		var image_div = $('<div style="text-align:left; font-size:10px; margin:2px;">&nbsp;&nbsp;Object Image URL<br/><input type="text" id="object_image" /></div>');
//		var url_div = $('<div style="text-align:left; font-size:10px; margin:2px;">&nbsp;&nbsp;Object URL<br/><input type="text" id="object_url" /></div>');
//		var add_button_div = $('<div style="text-align:center; font-size:10px; margin:2px;"><input type="button" id="add_button" value=" Add " class="object-button"/><input type="button" value="Cancel" id="cancel_button" class="object-button"/></div>');
//
//		var add_container = $("<div id='add_container' style='border:2px solid black; background-color:white; padding:5px; position:absolute; left:"+x+"px; top:"+y+"px;'></div>");
//
//		add_container.append(title_div).append(image_div).append(url_div).append(br).append(add_button_div).appendTo('body');
//
//		$("#cancel_button").click(function(){
//			cancelButtonClicked();
//		});
//
//		$("#add_button").click(function(){
//			addButtonClicked();
//		});
	}
	
	function addObjectToDatabase(object_title,object_image,object_url) {
		objectDatabase.push({ title:object_title, image:object_image, url:object_url });
	}
	
	function addButtonClicked() {
		var object_title = $('#object_title').val();
		var object_image = $('#object_image').val();
		var object_url = $('#object_url').val();
		
		//simulate this function to add object to your Db
		addObjectToDatabase(object_title,object_image,object_url);
		genericAdd(object_title,object_image,object_url);
		
		$('#object_title').val('');
		$('#object_image').val('');
		$('#object_url').val('');
		
		cancelButtonClicked();
	}
	
	function genericAdd(objectId,object_title,object_image,object_url) {
		var object_url_html='';
		var object_image_html='';
		
		if(null==object_title || $.trim(object_title)=="") {
			alert('Please enter an Object title');
			return;
		}

		if(null!=object_url && $.trim(object_url)!="") {
			object_url_html='<div class="data"><a href="'+object_url+'">'+object_title+'</a></div>';
		} else {
			object_url_html='<div class="data">'+object_title+'</div>';
		}

		if(null!=object_image && $.trim(object_image)!="") {
			object_image_html='<div class="object-img" style="background-image:url('+object_image+'); "></div>';
			/*
			//preload the image-------
			Image1= new Image();
			Image1.src = pin_image;
			Image1.onload=function() {
				attachPin(pin_image_html,pin_url_html);
				return;
			};
			//------------------------
			*/
		}
		
		attachObject(objectId, object_image_html,object_url_html)
		
		
	}
	
	function attachObject(objectId, object_image_html,object_url_html) {
		var $object = $('<div class="object draggableObjects draggableObjectsPHP" >'+object_image_html+object_url_html+'</div>');
		$('.'+objectId).prepend( $object ).masonry( 'reload' );
		$object.draggable({
			cancel: "a.ui-icon", 
			revert: "invalid", 
			containment: "document", 
			helper: "clone",
			zIndex: 120,
			cursor: "move"
		});
	}
	
	  
	$(".draggableObjectsPHP").draggable({
		drag: function( event, ui ) {alert('dragstart');},
			cancel: "a.ui-icon", 
			revert: "invalid", 
			containment: "document", 
			helper: "clone",
			zIndex: 120,
			cursor: "move"
			
	});
	
	function onDragStart(event) {
		alert('hi');
	}
	
	$(".draggableObjectsPHP").bind('dragstart',onDragStart,false);
	
	$(".mainContainerPHP").droppable({
		accept: ".draggableObjectsPHP",
		activeClass: "ui-state-highlight",
		drop: function(event, ui) {
//            alert('dropable called')
            var projectId = $("#projectId").val();
            var draggableContent = ui.draggable;
			addCircle(ui.draggable,this.id);
		}
	});
		
	$(".mainContainerPHP").mouseover(function(){
		var containerId = this.id;
		TweenLite.to($("#b"+containerId), 0.2, {css: {width:150,height:150,marginLeft:-20, marginTop:-20}, ease:Power2.easeOut,onComplete:
		function(){
			calculatePositions(containerId);
		}
		});	
	});
	
	$(".mainContainerPHP").mouseleave(function(){
		var resultCircleClass = ".r"+this.id;
		var bigCircleId = "#b"+this.id;

		TweenLite.to($(resultCircleClass),0.2,{css:{autoAlpha:0,scaleX:0.1,scaleY:0.1}});

		TweenLite.to($(bigCircleId), 0.2, {css: {width:110,height:110,marginLeft:0, marginTop:0}, delay:0.2, overwrite:"all"});
	});	

	$(".smallCircle").click(function(){
		var object;
		var containerId = $(this).parent().attr("id");
		var bigCircleId = "#b" + containerId;
		var resultCircleClass = ".r" + containerId;
		$('#objectBoxPHP').hide();
		$('#circleBox').show();

		$('#circleBox').masonry('remove',$('.object')).masonry('reload');
		
		$(bigCircleId).children(resultCircleClass).each(function(){
		    var context = $(this);
		    object = $('<div class="object draggableObjects">' + context.html() + '</div>');
		    $('#circleBox').append(object).masonry('appended',object);
		});
		
		$('.draggableObjects:not(.ui-draggable)').draggable({
			cancel: "a.ui-icon", 
			revert: "invalid", 
			containment: "document",
			helper: "clone",
			zIndex: 120,
			cursor: "move"
		});
		
	});	
	
	/*
	$(".bigCircle").click(function(){
		alert('bigCircle');
	});*/	

	$(".bigCircle").on('click','.resultCircle',function(){
        //$(this).parent().append("<div class='akash' >asdasdasdasd </div>");
//        $("<div class='akash dn'> </div>").insertAfter(this);
        console.log($(this).css('top'));
        var new_top = (parseInt($(this).css('top')) + 30 );
        var new_left = (parseInt($(this).css('left')));
        console.log(new_top);
        $(".project-resource").css('top', new_top);
        $(".project-resource").css('left', new_left);
        /*$(".project-resource").css({top: (parseInt($(this).css('left')))+ "px !important"});*/
        $(".project-resource").show();

        /*var containerId = this.id;
        TweenLite.to($("#b"+containerId), 0.2, {css: {width:150,height:150,marginLeft:-20, marginTop:-20}, ease:Power2.easeOut,onComplete:
            function(){
                calculatePositions(containerId);
            }
        });*/

    });

});

function addCircle($item, containerId){
	
	var resultCircleClass = "r"+containerId;
	var div = $("<div class='resultCircle "+resultCircleClass+"' >"+$item.html()+"</div>");
	$('#b'+containerId).append(div);
	calculatePositions(containerId);
}

function calculatePositions(containerId){
	
	var bigCircleId = "#b"+containerId;
	var resultCircleClass = ".r"+containerId;
	var radius 		= 75 - 15 - 1; //outer circle radius - result circle radius - offset
	var num    		= $(bigCircleId).children().length;
	var dividers  	= 360/num;
	var center 		= 60; // radius of middle circle + 5(offset)
	var theta       = 0.0;
	var radians = dividers * (Math.PI / 180);
	
	for(var i=0;i<num;i++){
		
		var x = Math.round(center+radius*Math.cos(theta));
		var y = Math.round(center+radius*Math.sin(theta));
        var M = $(".project-resource").children();
		
		$(bigCircleId+" :nth-child("+(i+1)+")").not(".project-resource, .slider, .ui-slider-range-min, .ui-slider-handle").css({'left':x,'top':y});
		
		theta +=  radians;
	}
	TweenLite.to($(resultCircleClass),0.1,{css:{autoAlpha:1,scaleX:1,scaleY:1}});
	
}