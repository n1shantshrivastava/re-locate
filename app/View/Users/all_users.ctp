<div class="row">

    <div class="users index">
        <h2><?php echo __('Users / Resources');?>
            <a href="javascript:window.history.back();" class="pull-right backButton"></a>
            <div class="pull-right" style="margin-right: 10px;">
                <?php echo $this->Html->link(__('New User'), array('action' => 'add'),array('class'=>'btn btn-primary')); ?>
            </div>
        </h2>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('employee_id', 'Employee Id');?></th>
                <th><?php echo $this->Paginator->sort('first_name');?></th>
                <th><?php echo $this->Paginator->sort('last_name');?></th>
                <th><?php echo $this->Paginator->sort('username', 'Email Id');?></th>
                <th><?php echo $this->Paginator->sort('technology_id');?></th>
                <th><?php echo $this->Paginator->sort('work_experience');?></th>
                <th class="actions"><?php echo __('Actions');?></th>
            </tr>
            <?php
            if(!empty($users)) {
            foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo h($user['User']['employee_id']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['Technology']['stream_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['work_experience']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('action' => 'view', $user['User']['id']), array('class' => 'icon-eye-open'));
                        echo $this->Html->link(__(''), array('action' => 'edit', $user['User']['id']), array('class' => 'icon-edit'));
                        echo $this->Html->link(
                            '', array('action' => 'delete', $user['User']['id']), array(
                                'class' => 'icon-trash',
                            ),
                            __('You are about to delete %s', '"'.$user['User']['first_name'] . ' ' . $user['User']['last_name'] . '", Are you sure?')
                        ); ?>
                    </td>
                </tr>
                <?php }
            } else { ?>
                <tr><td colspan="7">No users are added yet.</td> </tr>
            <?php } ?>
        </table>

        <?php
        $hasPages = ($this->params['paging']['User']['pageCount'] > 1);

        if ($hasPages)
        {
            echo $this->element('pagination');
        } ?>
    </div>
</div>
