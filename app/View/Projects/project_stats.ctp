<h2>Projects</h2>
<div class="tabs clearfix">
    <ul>
        <?php $cnt = 0;
        foreach ($projects as $project): ?>
        <li>
            <a href="#project<?php echo $cnt++?>" project-id="<?php echo $project['Project']['id']?>"><?php echo $project['Project']['project_name']?></a>
            <div class="progress progress-striped active">
                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
<?php //$cnt = 0;
        //foreach ($projects as $project): ?>

    <div id="project<?php echo $cnt++ ?>" class="tabs-content">

        <div id="projectName" class="pieCharts"></div>

    </div>
            <?php //endforeach; ?>
    </div>

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
    var firstContent = $(".tabs li:first-child a").attr("href");
    $(firstContent).show()
    $(".tabs li a").click(function( event ){
        var activeTab= $(this).attr("href");
        event.preventDefault();
        $(".tabs li").stop().removeClass("active");
        $(this).parent("li").stop().addClass("active");
        var projectId = $(this).attr('project-id');
        $.ajax({
            type: "GET",
            url:"/projects/get_project_details",
            data:{'project_id':projectId},
            dataType:'json',
            success:function (result) {
                if(result.status !=0){
                    chart.categoryField = "title";
                    chart.dataProvider = result.chartData;
                    chart.write('projectName');

                }
            }
        });
    });
    </script>