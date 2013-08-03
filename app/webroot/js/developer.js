$(document).ready(function () {
    $('#start').datepicker({
        dateFormat:'d-m-Y',
        onSelect:function (selectedDate) {
            $("#end").attr("value", selectedDate);
            $("#end").datepicker("option", "minDate", selectedDate);
        }
    });
    $('#end').datepicker({
        dateFormat:'d-m-Y'
    });
});