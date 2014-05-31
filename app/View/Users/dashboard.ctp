<script type="text/javascript" src="/js/amcharts.js"></script>
<script type="text/javascript" src="/js/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Dashboard</h1>
            <a href="">Teams <i></i></a>
            <div id="chartdiv"></div>
            <a href="">Projects <i></i></a>
            <div id="chartsiv"></div>
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
        "dataProvider": [{
            "country": "USAF",
            "litres": 256.9
        }, {
            "country": "Ice Cream",
            "litres": 131.1
        }, {
            "country": "Grand GAme",
            "litres": 115.8
        }, {
            "country": "International",
            "litres": 109.9
        }, {
            "country": "Miss Disha Mocha",
            "litres": 108.3
        }, {
            "country": "UK",
            "litres": 65
        }, {
            "country": "Belgium",
            "litres": 40
        }],
        "valueField": "litres",
        "titleField": "country",
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
        "type": "pie",
        "theme": "none",
        "legend": {
            "markerType": "circle",
            "position": "right",
            "marginRight": 80,
            "autoMargins": false
        },
        "dataProvider": [{
            "country": "USAF",
            "litres": 256.9
        }, {
            "country": "Ice Cream",
            "litres": 131.1
        }, {
            "country": "Grand GAme",
            "litres": 115.8
        }, {
            "country": "International",
            "litres": 109.9
        }, {
            "country": "Miss Disha Mocha",
            "litres": 108.3
        }, {
            "country": "UK",
            "litres": 65
        }, {
            "country": "Belgium",
            "litres": 40
        }],
        "valueField": "litres",
        "titleField": "country",
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