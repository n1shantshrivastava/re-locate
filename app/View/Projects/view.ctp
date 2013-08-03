<script type="text/javascript">
    //config -
    //simulate this db to be in your server--------
    objectDatabasephp=[{title:"Hello",image:"",url:""},
        {title:"Sachin",image:"https://lh6.googleusercontent.com/-gFSf20CDQos/UKyfK_76ZeI/AAAAAAAAAMc/yTWayUoqA1k/s128/sachin.jpg",url:""},
        {title:"Batman",image:"https://lh5.googleusercontent.com/-4TaI4pvaUzo/UMX_RLSLFZI/AAAAAAAAAc4/2OADM-Izh8E/s800/bat.png",url:""},
        {title:"Android in Rain",image:"https://lh3.googleusercontent.com/-CFI2PBn3xaE/UMX_RUigPTI/AAAAAAAAAc8/VApDqnIDvEQ/s800/android_bot.png",url:""},
        {title:"Delhi Belli",image:"https://lh6.googleusercontent.com/-SkmrjH6gxjQ/UMX_UEpoWoI/AAAAAAAAAdQ/VPrPpyxfVLE/s800/db.png",url:""},
        {title:"Code Handling",image:"https://lh3.googleusercontent.com/-jr-SH35yoRw/UL4ANu3ifYI/AAAAAAAAAaA/1-VHYf-Dvgo/s800/ch.png",url:"http://www.codehandling.com"}];

    objectDatabaseiphone=[{title:"Hello",image:"",url:""},
        {title:"Sachin",image:"https://lh6.googleusercontent.com/-gFSf20CDQos/UKyfK_76ZeI/AAAAAAAAAMc/yTWayUoqA1k/s128/sachin.jpg",url:""},
        {title:"Batman",image:"https://lh5.googleusercontent.com/-4TaI4pvaUzo/UMX_RLSLFZI/AAAAAAAAAc4/2OADM-Izh8E/s800/bat.png",url:""},
        {title:"Android in Rain",image:"https://lh3.googleusercontent.com/-CFI2PBn3xaE/UMX_RUigPTI/AAAAAAAAAc8/VApDqnIDvEQ/s800/android_bot.png",url:""},
        {title:"Delhi Belli",image:"https://lh6.googleusercontent.com/-SkmrjH6gxjQ/UMX_UEpoWoI/AAAAAAAAAdQ/VPrPpyxfVLE/s800/db.png",url:""},
        {title:"Code Handling",image:"https://lh3.googleusercontent.com/-jr-SH35yoRw/UL4ANu3ifYI/AAAAAAAAAaA/1-VHYf-Dvgo/s800/ch.png",url:"http://www.codehandling.com"}];

    //------------------------------------------------
</script>
<div class="container">
    <!-- Forms
   ================================================== -->
    <section id="forms">
        <input type="hidden" name="project_id" id="projectId" value="<?php echo h($project['Project']['id']); ?>" />
        <div class="row">
            <div class="span10 offset1">
                <div class="form-horizontal well">
                <legend><?php echo h($project['Project']['project_name']); ?></legend>
                    <div class="mainCircleContainer mainContainer-php" id="1" style="">
                        <!-- <div id="dragWindow"></div>-->
                        <div id="s1" class="smallCircle smallCircle-php">
                            <label id="circleLabel">Web Links</label>
                        </div>
                        <div id="b1" class="bigCircle bigCircle-php">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div >
                        <div id="objectBox" class="objectBox-php">
                            <div class="corner-stamp" id="add_box"></div>
                        </div>
                        <div id="circleBox" class="circleBox-php">
                            <div class="corner-stamp" id="show_all-php">show all <br/>objects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>

<!--<div class="projects view">-->
<!--<h2>--><?php // echo __('Project');?><!--</h2>-->
<!--	<dl>-->
<!--		<dt>--><?php //echo __('Id'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['id']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Project Name'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['project_name']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Account Name'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['account_name']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Project Type'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['project_type']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Description'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['description']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Start Date'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['start_date']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('End Date'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['end_date']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Created'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['created']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--		<dt>--><?php //echo __('Modified'); ?><!--</dt>-->
<!--		<dd>-->
<!--			--><?php //echo h($project['Project']['modified']); ?>
<!--			&nbsp;-->
<!--		</dd>-->
<!--	</dl>-->
<!--</div>-->
<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!--		<li>--><?php //echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Project'), array('action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Project Resource Requirements'), array('controller' => 'project_resource_requirements', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Project Resource Requirement'), array('controller' => 'project_resource_requirements', 'action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Project Technologies'), array('controller' => 'project_technologies', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Project Technology'), array('controller' => 'project_technologies', 'action' => 'add')); ?><!-- </li>-->
<!--	</ul>-->
<!--</div>-->
<!--<div class="related">-->
<!--	<h3>--><?php //echo __('Related Project Resource Requirements');?><!--</h3>-->
<!--	--><?php //if (!empty($project['ProjectResourceRequirement'])):?>
<!--	<table cellpadding = "0" cellspacing = "0">-->
<!--	<tr>-->
<!--		<th>--><?php //echo __('Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Project Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Technology Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('No Of Resources'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Required Percentage'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Created'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Modified'); ?><!--</th>-->
<!--		<th class="actions">--><?php //echo __('Actions');?><!--</th>-->
<!--	</tr>-->
<!--	--><?php
//		$i = 0;
//		foreach ($project['ProjectResourceRequirement'] as $projectResourceRequirement): ?>
<!--		<tr>-->
<!--			<td>--><?php //echo $projectResourceRequirement['id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['project_id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['technology_id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['no_of_resources'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['required_percentage'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['created'];?><!--</td>-->
<!--			<td>--><?php //echo $projectResourceRequirement['modified'];?><!--</td>-->
<!--			<td class="actions">-->
<!--				--><?php //echo $this->Html->link(__('View'), array('controller' => 'project_resource_requirements', 'action' => 'view', $projectResourceRequirement['id'])); ?>
<!--				--><?php //echo $this->Html->link(__('Edit'), array('controller' => 'project_resource_requirements', 'action' => 'edit', $projectResourceRequirement['id'])); ?>
<!--				--><?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'project_resource_requirements', 'action' => 'delete', $projectResourceRequirement['id']), null, __('Are you sure you want to delete # %s?', $projectResourceRequirement['id'])); ?>
<!--			</td>-->
<!--		</tr>-->
<!--	--><?php //endforeach; ?>
<!--	</table>-->
<?php //endif; ?>
<!---->
<!--	<div class="actions">-->
<!--		<ul>-->
<!--			<li>--><?php //echo $this->Html->link(__('New Project Resource Requirement'), array('controller' => 'project_resource_requirements', 'action' => 'add'));?><!-- </li>-->
<!--		</ul>-->
<!--	</div>-->
<!--</div>-->
<!--<div class="related">-->
<!--	<h3>--><?php //echo __('Related Project Technologies');?><!--</h3>-->
<!--	--><?php //if (!empty($project['ProjectTechnology'])):?>
<!--	<table cellpadding = "0" cellspacing = "0">-->
<!--	<tr>-->
<!--		<th>--><?php //echo __('Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Project Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Technology Id'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Created'); ?><!--</th>-->
<!--		<th>--><?php //echo __('Modified'); ?><!--</th>-->
<!--		<th class="actions">--><?php //echo __('Actions');?><!--</th>-->
<!--	</tr>-->
<!--	--><?php
//		$i = 0;
//		foreach ($project['ProjectTechnology'] as $projectTechnology): ?>
<!--		<tr>-->
<!--			<td>--><?php //echo $projectTechnology['id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectTechnology['project_id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectTechnology['technology_id'];?><!--</td>-->
<!--			<td>--><?php //echo $projectTechnology['created'];?><!--</td>-->
<!--			<td>--><?php //echo $projectTechnology['modified'];?><!--</td>-->
<!--			<td class="actions">-->
<!--				--><?php //echo $this->Html->link(__('View'), array('controller' => 'project_technologies', 'action' => 'view', $projectTechnology['id'])); ?>
<!--				--><?php //echo $this->Html->link(__('Edit'), array('controller' => 'project_technologies', 'action' => 'edit', $projectTechnology['id'])); ?>
<!--				--><?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'project_technologies', 'action' => 'delete', $projectTechnology['id']), null, __('Are you sure you want to delete # %s?', $projectTechnology['id'])); ?>
<!--			</td>-->
<!--		</tr>-->
<!--	--><?php //endforeach; ?>
<!--	</table>-->
<?php //endif; ?>
<!---->
<!--	<div class="actions">-->
<!--		<ul>-->
<!--			<li>--><?php //echo $this->Html->link(__('New Project Technology'), array('controller' => 'project_technologies', 'action' => 'add'));?><!-- </li>-->
<!--		</ul>-->
<!--	</div>-->
<!--</div>-->
