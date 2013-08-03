<div class="row">
    <div class="">
        <div class="hero-unit">
            <h2><?php  echo __('User');?></h2>
            <table class="table table-striped table-hover">
                <tr>
                    <td width="40%"><?php echo __('Employee Id'); ?></td>
                    <td>
                        <?php echo h($user['User']['employee_id']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Email Id'); ?></td>
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
            </table>
            <div class="pull-right">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit',$user['User']['id']),array('class'=>'btn btn-primary'));
                echo $this->Html->link(
                    'Delete', array('action' => 'delete', $user['User']['id']), array(
                        'class' => 'btn btn-primary',
                    ),
                    __('You are about to delete %s', '"'.$user['User']['first_name'] . ' ' . $user['User']['last_name'] . '", Are you sure?')
                );
                echo $this->Html->link(__('Back'), array('action' => 'dashboard'),array('class'=>'btn')); ?>
            </div>
        </div>
    </div>
</div>
