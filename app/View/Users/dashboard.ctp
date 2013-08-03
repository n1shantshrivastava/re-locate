<div class="row">
    <div class="span9 users index pull-right">
        <h2><?php echo __('Users / Resources');?></h2>
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
            foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['employee_id']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['Technology']['stream_name']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['work_experience']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('action' => 'view', $user['User']['id']), array('class' => 'icon-eye-open')); ?>
                        <?php echo $this->Html->link(__(''), array('action' => 'edit', $user['User']['id']), array('class' => 'icon-edit')); ?>
                        <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $user['User']['id']), array('class' => 'icon-trash'), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>

        <ul class="pager">
            <li><a class="previous disabled">
                <?php
                echo $this->Paginator->prev(('← Previous'), array(), null, array('tag'=>false));
                ?></a>
            </li>
<!--            <li>-->
                <?php echo $this->Paginator->numbers(array('tag'=>'li')); ?>
<!--            </li>-->
            <li><a class="next disabled">
                <?php
                echo $this->Paginator->next(('Next →'), array(), null, array('tag'=>false));
                ?></a>
            </li>
        </ul>
    </div>
    <div class="span3 actions pull-left">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Technologies'), array('controller' => 'technologies', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Technology'), array('controller' => 'technologies', 'action' => 'add')); ?> </li>
            </ul>
        </div>
    </div>
</div>
