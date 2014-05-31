$(document).ready(function () {
    $('#start').datepicker({
        dateFormat:'dd-mm-yy',
        onSelect:function (selectedDate) {
            $("#end").attr("value", selectedDate);
            $("#end").datepicker("option", "minDate", selectedDate);
        }
    });
    $('#end').datepicker({
        dateFormat:'dd-mm-yy'
    });
    $(".tabs-content").hide();
    var firstContent = $(".tabs li:first-child a").attr("href");
    $(firstContent).show()
    $(".tabs li a").click(function( event ){
        var activeTab= $(this).attr("href");
        event.preventDefault();
        $(".tabs-content").stop().slideUp();
        $(".tabs li").stop().removeClass("active");
        $(activeTab).stop().slideDown();
        $(this).parent("li").stop().addClass("active");
    });
});