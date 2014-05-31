$(document).ready(function () {

    $(function () {

        $('.circleBox').hide();

        $('.objectBox').masonry({
            // options
            itemSelector:'.draggableObjects-'+$(this).attr('slug'),
            columnWidth:10,
            cornerStampSelector:''
        });

        $('.circleBox').masonry({
            // options
            itemSelector:'.draggableObjects-'+$(this).attr('slug'),
            columnWidth:10,
            cornerStampSelector:'.corner-stamp'
        });

        //genericAdd("Object Title","Object Image URL","URL linked to Object");

        displayObjectsFromDatabase();
    });

    function displayObjectsFromDatabase() {
//        console.log('displayObjects method called');
        $.each(objectDatabase, function(slug, value){
            $.each(value, function (i, v) {
                genericAdd(slug, v.title, v.image, v.url);
            });
        })

    }


    $("#show_all").click(function (e) {
        $('.circleBox').hide();
        $('.objectBox').show();
        displayObjectsFromDatabase();
    });


    function genericAdd(slug, object_title, object_image, object_url) {
        var object_url_html = '';
        var object_image_html = '';

        if (null == object_title || $.trim(object_title) == "") {
            alert('Please enter an Object title');
            return;
        }

        if (null != object_url && $.trim(object_url) != "") {
            object_url_html = '<div class="data"><a href="' + object_url + '" id="' + object_url + '">' + object_title + '</a></div>';
        } else {
            object_url_html = '<div class="data" id="' + object_url + '">' + object_title + '</div>';
        }

        if (null != object_image && $.trim(object_image) != "") {
            object_image_html = '<div class="object-img" style="background-image:url(' + object_image + '); " id="' + object_url + '" ></div>';
        }

        attachObject(slug, object_image_html, object_url_html, object_url)


    }

    function attachObject(slug, object_image_html, object_url_html, object_url) {
        var $object = $('<div class="object draggableObjects draggableObjects-'+slug+'"  id="' + object_url + '" >' + object_image_html + object_url_html + '</div>');
        var objectId = 'objectBox-' + slug;
        $('.' + objectId).prepend($(object)).masonry('reload');
        $(object).draggable({
            cancel:"a.ui-icon",
            revert:"invalid",
            containment:"document",
            helper:"clone",
            zIndex:120,
            cursor:"move"
        });
    }


    $(".draggableObjects").draggable({
        drag:function (event, ui) {
            alert('dragstart');
        },
        cancel:"a.ui-icon",
        revert:"invalid",
        containment:"document",
        helper:"clone",
        zIndex:120,
        cursor:"move"

    });

    function onDragStart(event) {

    }

    $(".draggableObjects").bind('dragstart', onDragStart, false);

    $(".mainContainer").droppable({
        accept:".draggableObjects-"+$(this).attr('slug'),
        activeClass:"ui-state-highlight",
        drop:function (event, ui) {

            var projectId = $("#projectId").val();
            var draggableContent = ui.draggable;
            var user_id = draggableContent.children("div").attr("id");

            var thisobject = this;
            $.ajax({
                type: "POST",
                url:"/projects/add_project_resource",
                data:{'project_id':projectId,'user_id':user_id},
                success:function (result) {
                    var resultDt = jQuery.parseJSON(result);
                    if(resultDt['status'] == 'success'){
                        addCircle(ui.draggable, thisobject);
                        $("#errorDivandroid").html();
                        $("#errorDivandroid").html('<span class="success">'+resultDt['message']+'</span>');
                    }else{
                        $("#errorDivandroid").html();
                        $("#errorDivandroid").html('<span class="error">'+resultDt['message']+'</span>');
                    }
                }
            });
        }
    });

    $(".mainContainer").mouseover(function () {
        var containerId = this.id;
        TweenLite.to($("#b" + containerId), 0.2, {css:{width:150, height:150, marginLeft:-20, marginTop:-20}, ease:Power2.easeOut, onComplete:function () {
            calculatePosition(containerId);
        }
        });
    });

    $(".mainContainer").mouseleave(function () {
        var resultCircleClass = ".r" + this.id;
        var bigCircleId = "#b" + this.id;

        TweenLite.to($(resultCircleClass), 0.2, {css:{autoAlpha:0, scaleX:0.1, scaleY:0.1}});

        TweenLite.to($(bigCircleId), 0.2, {css:{width:110, height:110, marginLeft:0, marginTop:0}, delay:0.2, overwrite:"all"});
    });

    $(".smallCircle").click(function () {
        var object;
        var containerId = $(this).parent().attr("id");
        var bigCircleId = "#b" + containerId;
        var resultCircleClass = ".r" + containerId;
        var slug = $(this).attr("slug");
        $('.objectBox').hide();
        $('.circleBox').show();

        $('.circleBox').masonry('remove', $('.draggableObjects-'+slug)).masonry('reload');

        $(bigCircleId).children(resultCircleClass).each(function () {
            var context = $(this);
            object = $('<div class="object draggableObjects draggableObjects-'+slug+'" >' + context.html() + '</div>');
            $('.circleBox-'+slug).append(object).masonry('appended', object);
        });

        $('.draggableObjects-android:not(.ui-draggable)').draggable({
            cancel:"a.ui-icon",
            revert:"invalid",
            containment:"document",
            helper:"clone",
            zIndex:120,
            cursor:"move"
        });

    });

    /*
     $(".bigCircle").click(function(){
     alert('bigCircle');
     });*/

    $(".bigCircle").on('click', '.resultCircle', function () {
        console.log($(this).css('top'));
        var new_top = (parseInt($(this).css('top')) + 30 );
        var new_left = (parseInt($(this).css('left')));
        console.log(new_top);
        $(".project-resource").css('top', new_top);
        $(".project-resource").css('left', new_left);
        $(".project-resource").show();
    });

});

function addCircle($item, container) {
    var containerId = $(container).id;
    var resultCircleClass = "r" + containerId;
    var slug = $(container).slug;

    var div = $("<div class='resultCircle resultCircle-"+slug+' '+ resultCircleClass + "' >" + $item.html() + "</div>");
    $('#b' + containerId).append(div);
    calculatePosition(containerId);
}

function calculatePosition(containerId) {

    var bigCircleId = "#b" + containerId;
    var resultCircleClass = ".r" + containerId;
    var radius = 75 - 15 - 1; //outer circle radius - result circle radius - offset
    var num = $(bigCircleId).children().length;
    var dividers = 360 / num;
    var center = 60; // radius of middle circle + 5(offset)
    var theta = 0.0;
    var radians = dividers * (Math.PI / 180);

    for (var i = 0; i < num; i++) {

        var x = Math.round(center + radius * Math.cos(theta));
        var y = Math.round(center + radius * Math.sin(theta));
        var M = $(".project-resource").children();

        $(bigCircleId + " :nth-child(" + (i + 1) + ")").not(".project-resource, .slider, .ui-slider-range-min, .ui-slider-handle").css({'left':x, 'top':y});

        theta += radians;
    }
    TweenLite.to($(resultCircleClass), 0.1, {css:{autoAlpha:1, scaleX:1, scaleY:1}});

}