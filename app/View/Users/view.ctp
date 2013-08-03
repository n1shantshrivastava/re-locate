<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'dashboard')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="hero-unit">
            <h2><?php  echo __('User');?></h2>
            <table class="table">
                <tr>
                    <td><?php echo __('Id'); ?></td>
                    <td>
                        <?php echo h($user['User']['id']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Username'); ?></td>
                    <td>
                        <?php echo h($user['User']['username']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('First name'); ?></td>
                    <td>
                        <?php echo h($user['User']['first_name']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Last Name'); ?></td>
                    <td>
                        <?php echo h($user['User']['last_name']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Technology'); ?></td>
                    <td>
                        <?php echo h($user['Technology']['stream_name']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Employee Id'); ?></td>
                    <td>
                        <?php echo h($user['User']['employee_id']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Salary'); ?></td>
                    <td>
                        <?php echo h($user['User']['salary']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Work experience'); ?></td>
                    <td>
                        <?php echo h($user['User']['work_experience']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Role'); ?></td>
                    <td>
                        <?php echo h($user['Role']['role']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Is Verified'); ?></td>
                    <td>
                        <?php echo h($user['User']['is_verified']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Is Active'); ?></td>
                    <td>
                        <?php echo h($user['User']['is_active']); ?>
                        &nbsp;
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
