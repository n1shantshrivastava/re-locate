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

});