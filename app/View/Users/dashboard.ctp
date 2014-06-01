
<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Dashboard</h1>
            <a >Teams<i></i></a>
            <div id="chartsiv"></div>
            <a href="/projects/project_stats">Projects<i></i></a>
            <div id="chartdiv"></div>

        </div>

        <div class="container">

        </div>
    </section>
</div>
<script type="text/javascript">

    var chart = AmCharts.makeChart("chartdiv", {
        "type": "pie",
        "theme": "none",
        "useMarkerColorForLabels": true,
        "legend": {
            "markerType": "circle",
            "position": "right",
            "marginRight": 80,
            "autoMargins": false
        },
        "dataProvider": <?php echo $projects?>,
        "valueField": "employee_count",
        "titleField": "project_name",
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "exportConfig": {
            "menuTop":"0px",
            "menuItems": [{
                "icon": '/lib/3/images/export.png',
                "format": 'png'
            }]
        }

    });
<!--    project dashboard chart-->
    var chart = AmCharts.makeChart("chartsiv", {
        "dataProvider":<?php echo $teams?> ,
        "type": "pie",
        "theme": "none",
        "legend": {
            "markerType": "circle",
            "position": "right",
            "marginRight": 80,
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
