<?php
echo $this->Html->script(array('validations', 'projects/project-add'), false);
?>
<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h3>Edit Project  <a href="javascript:window.history.back();" class="pull-right backButton"></a></h3>
        </div>

                <?php
                echo $this->Form->create('Project', array(
                    'class' => "form-horizontal",
                    'inputDefaults' => array('label' => false, 'div' => false)
                ));
                echo $this->Form->hidden('Project.id' , array('value' => $project_id));
                ?>
                <div class="form-actions">
                    <div class="control-group info">
                        <label class="control-label" for="projectName">Project Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('project_name'); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="accountName">Account Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('account_name'); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="projectType">Project Type</label>

                        <div class="controls">
                            <?php echo $this->Form->input('project_type'); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="description">Description</label>

                        <div class="controls">
                            <?php echo $this->Form->input('description'); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="start">Start Date</label>

                        <div class="controls">
                            <?php
                            echo $this->Form->input(
                                'start_date', array(
                                'class' => 'tip span3 date-picker',
                                'placeholder' => 'Enter Start Date',
                                'id' => 'start',
                                'type' => 'text',
                                'value' => date('d-m-Y')
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="end">End Date</label>

                        <div class="controls">
                            <?php
                            echo $this->Form->input(
                                'end_date', array(
                                'class' => 'tip span3 date-picker',
                                'placeholder' => 'Enter End Date',
                                'id' => 'end',
                                'type' => 'text',
                                'value' => date('d-m-Y')
                            ));
                            ?>
                        </div>
                    </div>
                </div>

                <!--Project Requirements : start-->
                <div class="form-actions">
                    <div class="page-header">
                        <h3>Project Requirements</h3>
                    </div>

                    <div class="control-group info project-requirements" id="project-requirements">
                        <div class="add-more">
                            <button type="button" class="btn btn-primary btn-small" id="addMore">Add More</button>
                        </div>

                        <?php
                        if (isset($this->request->data['ProjectResourceRequirement']) && !empty($this->request->data['ProjectResourceRequirement'])) {
                            foreach ($this->request->data['ProjectResourceRequirement'] as $requirementKey => $projectResourceRequirement) {
                                ?>
                                <div class="requirements clearfix" id="requirements">
                                    <?php echo $this->Form->hidden("ProjectResourceRequirements." . ($requirementKey + 1) . ".id" , array('value' => $projectResourceRequirement['id'])) ?>
                                    <span class="pull-left">
                                    <?php
                                        echo $this->Form->input("ProjectResourceRequirements." . ($requirementKey + 1) . ".technology_id", array(
                                            'options' => $technologies,
                                            'div' => false,
                                            'label' => false,
                                            'value' => $projectResourceRequirement['technology_id'],
                                            'empty' => 'Select Technology'
                                        ));
                                        ?>
                                    </span>
                                    <span class="pull-left">
                                    <?php
                                        $percentages = array(
                                            5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40,
                                            45 => 45, 50 => 50, 55 => 55, 60 => 60, 65 => 65, 70 => 70, 75 => 75, 80 => 80,
                                            85 => 85, 90 => 90, 95 => 95, 100 => 100
                                        );
                                        echo $this->Form->input("ProjectResourceRequirements." . ($requirementKey + 1) . ".required_percentage", array(
                                            'options' => $percentages,
                                            'div' => false,
                                            'label' => false,
                                            'value' => $projectResourceRequirement['required_percentage'],
                                            'empty' => 'Allocation percentage'));
                                        ?>
                                    </span>
                                    <span class="pull-left">
                                    <?php
                                        echo $this->Form->input("ProjectResourceRequirements." . ($requirementKey + 1) . ".no_of_resources", array(
                                            'options' => array(
                                                1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7,
                                                8 => 8, 9 => 9, 10 => 10
                                            ),
                                            'div' => false,
                                            'label' => false,
                                            'value' => $projectResourceRequirement['no_of_resources'],
                                            'empty' => 'Number of resources'));
                                        ?>
                                    </span>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>

                </div>
                <!--Project Reequirements : end-->

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="/projects/all_projects" class="btn">Cancel</a>
                </div>
                <?php echo $this->Form->end(); ?>
    </section>
</div>
