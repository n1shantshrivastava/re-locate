<div id="projectName" class="pieCharts"></div>
<script type="text/javascript">

    var chart = AmCharts.makeChart("projectName", {
        "type": "pie",
        "theme": "none",
        "useMarkerColorForLabels": true,
        "dataProvider": <?php echo $technologyData; ?>,
        "legend": {
            "markerType": "circle",
            "position": "bottom",
            "autoMargins": false
        },
        "valueField": "employee_count",
        "titleField": "stream_name",
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "exportConfig": {
            "menuTop":"0px",
            "menuItems": [{
                "icon": '/lib/3/images/export.png',
                "format": 'png'
            }]
        }

    });
</script>