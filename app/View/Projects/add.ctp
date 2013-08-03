<?php echo $this->Html->script(array('projects/project-add')); ?>
<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Create Project</h1>
        </div>

        <div class="row">
            <div class="span10 offset1">
                <?php echo $this->Form->create('Project', array('class' => "form-horizontal well")); ?>
                <div class="form-actions">
                    <div class="control-group info">
                        <label class="control-label" for="projectName">Project Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('project_name', array('div' => false, 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="accountName">Account Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('account_name', array('div' => false, 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="projectType">Project Type</label>

                        <div class="controls">
                            <?php echo $this->Form->input('project_type', array('div' => false, 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="description">Description</label>

                        <div class="controls">
                            <?php echo $this->Form->input('description', array('div' => false, 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="start">Start</label>

                        <div class="controls">
                            <?php
                            echo $this->Form->input(
                                'start', array(
                                'class' => 'tip span3 date-picker',
                                'placeholder' => 'Enter Start Date',
                                'id' => 'start',
                                'type' => 'text',
                                'label' => false,
                                'value' => date('d-m-Y')
                            ));
                            ?>
                        </div>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="end">End</label>

                        <div class="controls">
                            <?php
                            echo $this->Form->input(
                                'end', array(
                                'class' => 'tip span3 date-picker',
                                'placeholder' => 'Enter End Date',
                                'id' => 'end',
                                'type' => 'text',
                                'label' => false,
                                'value' => date('d-m-Y')
                            ));
                            ?>
                        </div>
                    </div>
                </div>

                <!--Project Reequirements : start-->
                <div class="form-actions">
                    <div class="page-header">
                        <h3>Project Requirements</h3>
                    </div>

                    <div class="control-group info project-requirements" id="project-requirements" >
                        <div class="add-more">
                            <button type="button" class="btn btn-primary btn-small" id="addMore">Add More</button>
                        </div>

                        <div class="requirements" id="requirements">
                            <span class="pull-left">
                            <?php
                                echo $this->Form->input('ProjectResourceTechnologies.1.technology_id', array(
                                    'options' => $technologies,
                                    'div' => false,
                                    'label' => false,
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
                                echo $this->Form->input('ProjectResourceTechnologies.1.required_percentage', array(
                                    'options' => $percentages,
                                    'div' => false,
                                    'label' => false,
                                    'empty' => 'Allocation percentage'));
                                ?>
                        </span>
                            <span class="pull-left">
                            <?php
                                echo $this->Form->input('ProjectResourceTechnologies.1.number_of_resources', array(
                                    'options' => array(
                                        1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7,
                                        8 => 8, 9 => 9, 10 => 10
                                    ),
                                    'div' => false,
                                    'label' => false,
                                    'empty' => 'Number of resources'));
                                ?>
                        </span>
                        </div>
                    </div>

                </div>
                <!--Project Reequirements : end-->

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </section>
</div>

