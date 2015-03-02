
<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Dashboard</h1>
            <a >Teams<i></i></a>
            <div id="chartsiv"></div>
            <a href="/projects/project_stats">Projects<i></i></a>
            <div id="chartdiv"></div>

        </div>

<<<<<<< HEAD
        <div class="row">
            <div class="span12 offset1">
                <?php
                if (count($projects) > 0) {
                    foreach ($projects as $project) {
//                        pr($project);
                        ?>
                        <div class="form-actions">
                            <h3><?php echo $this->Html->link(__($project['Project']['project_name']), array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])); ?></h3>
                            <table class="table table-bordered table-striped table-hover">
                                <?php
                                if (count($project['ProjectsUser']) > 0) {
                                    foreach ($project['ProjectsUser'] as $projectUser) {
                                        ?>
                                        <tr>
                                            <td><?php echo $projectUser['User']['first_name'] . ' ' . $projectUser['User']['last_name']; ?></td>
                                            <td><?php echo $projectUser['User']['username']; ?></td>
                                            <td><?php echo $projectUser['Technology']['stream_name']; ?></td>
                                            <td><?php echo $projectUser['percentage_of_allocation']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">No resources are allocated to this project</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id']));?>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="form-actions">
                        No projects are active.
                    </div>
                    <?php
                }
                ?>
            </div>
=======
        <div class="container">

>>>>>>> df72fb085f7af8a1206f1f63b3881aa79c5f1aef
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
