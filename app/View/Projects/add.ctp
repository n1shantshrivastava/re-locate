<div class="projects form">
    <section id="forms">
        <div class="page-header">
            <h1>Create Project</h1>
        </div>

        <div class="row">
            <div class="span10 offset1">

                <?php echo $this->Form->create('Project', array('class' => "form-horizontal well")); ?>
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

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </section>
</div>

