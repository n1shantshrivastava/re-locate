<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="hero-unit">
            <h2><?php  echo __('User');?></h2>
            <table class="table">
                		<tr><td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Username'); ?></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Password'); ?></td>
		<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Phone'); ?></td>
		<td>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Imei'); ?></td>
		<td>
			<?php echo h($user['User']['imei']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('User Type'); ?></td>
		<td>
			<?php echo h($user['User']['user_type']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Is Verified'); ?></td>
		<td>
			<?php echo h($user['User']['is_verified']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Is Active'); ?></td>
		<td>
			<?php echo h($user['User']['is_active']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td></tr>
		<tr><td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td></tr>
            </table>
        </div>
    </div>
</div>
