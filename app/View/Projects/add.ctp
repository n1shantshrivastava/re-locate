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

                    <div class="control-group info">
                        <div class="controls">
                            <?php
                            echo $this->Form->input('technology_1', array('options' => $technologies, 'div' => false, 'label' => false));
//                            $percentages = $this->Relocate->allocationPercentage();
                            $percentages = array(5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90,
                                95, 100
                            );
                            echo $this->Form->input('percentage_1', array('options' => $percentages, 'div' => false, 'label' => false));

                            ?>
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

