<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Dashboard</h1>
        </div>

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
                <div class="form-actions">
                    <h3><?php echo 'Needlepoint'; ?></h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                    </table>
                </div>
                <div class="form-actions">
                    <h3><?php echo 'Needlepoint'; ?></h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>Richa Sharma</td>
                            <td>PHP</td>
                            <td>100%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>