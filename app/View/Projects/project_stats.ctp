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

    <div id="projectChart" class="tabs-content">

        <?php echo $this->element('project_stats_chart');?>

    </div>
            <?php //endforeach; ?>
    </div>

    <script type="text/javascript">

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
            dataType:'html',
            success:function (result) {
               $('#projectChart').html(result);
                    /*chart.categoryField = "title";
                    chart.valueField = 'employee_count';
                    chart.titleField = 'stream_name';

                    chart.dataProvider = result.chartData;
                    chart.validateData();*/


            }
        });
    });
    </script>