<div class="projects form">

    <section id="forms">
        <div class="page-header">
            <h1>Create Project</h1>
        </div>

        <div class="row">
            <div class="span10 offset1">

                <?php echo $this->Form->create('Project', array('class'=>"form-horizontal well")); ?>
                    <div class="control-group info">
                        <label class="control-label" for="projectName">Project Name</label>
                        <div class="controls">
                          <?php echo $this->Form->input('project_name', array('div'=>false,'label'=>false)); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
<?php echo $this->Form->create('Project');?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('project_name');
		echo $this->Form->input('account_name');
		echo $this->Form->input('project_type');
		echo $this->Form->input('description');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>

