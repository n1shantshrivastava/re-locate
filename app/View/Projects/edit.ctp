<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
		<legend><?php echo __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_name');
		echo $this->Form->input('account_name');
		echo $this->Form->input('project_type');
		echo $this->Form->input('description');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Project Resource Requirements'), array('controller' => 'project_resource_requirements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Resource Requirement'), array('controller' => 'project_resource_requirements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Technologies'), array('controller' => 'project_technologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Technology'), array('controller' => 'project_technologies', 'action' => 'add')); ?> </li>
	</ul>
</div>
