<h2>Projects</h2>
<div class="tabs clearfix">
    <ul>
        <li class="active">
            <a href="#project1">Project 1</a>
            <div class="progress progress-striped active">
                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </li>
        <li>
            <a href="#project2">Project 2</a>
            <div class="progress progress-striped active">
                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </li>
        <li>
            <a href="#project3">Project 3</a>
            <div class="progress progress-striped active">
                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </li>
    </ul>
    <div id="project1" class="tabs-content">
        <script type="text/javascript">
            var chart = AmCharts.makeChart("projectName", {
                "type": "pie",
                "theme": "none",
                "useMarkerColorForLabels": true,
                "legend": {
                    "markerType": "circle",
                    "position": "bottom",
                    "autoMargins": false
                },
                "dataProvider": [{
                    "country": "Czech Republic",
                    "litres": 256.9
                }, {
                    "country": "Ireland",
                    "litres": 131.1
                }, {
                    "country": "Germany",
                    "litres": 115.8
                }, {
                    "country": "Australia",
                    "litres": 109.9
                }, {
                    "country": "Austria",
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
        <div id="projectName" class="pieCharts"></div>

    </div>
    <div id="project2" class="tabs-content">
        <script type="text/javascript">
            var chart = AmCharts.makeChart("projectName2", {
                "type": "pie",
                "theme": "none",
                "useMarkerColorForLabels": true,
                "legend": {
                    "markerType": "circle",
                    "position": "bottom",
                    "autoMargins": false
                },
                "dataProvider": [{
                    "country": "Czech Republic",
                    "litres": 256.9
                }, {
                    "country": "Ireland",
                    "litres": 131.1
                }, {
                    "country": "Germany",
                    "litres": 115.8
                }, {
                    "country": "Australia",
                    "litres": 109.9
                }, {
                    "country": "Austria",
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
        <div id="projectName2" class="pieCharts"></div>
    </div>
    <div id="project3" class="tabs-content">
        asdasddddd
    </div>
</div>