<?php
echo $this->Html->script(array('validations'), false);
?>

<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="hero-unit">
            <h2><?php  echo __('User');?></h2>
            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false, 'div' => false)));?>
            <table class="table">
                    <?php echo $this->Form->hidden('id');?>
                <tr>
                    <td><?php echo __('Username'); ?></td>
                    <td><?php echo $this->Form->input('username');?></td>
                </tr>
                <tr>
                    <td><?php echo __('First name'); ?></td>
                    <td><?php echo $this->Form->input('first_name');?></td>
                </tr>
                <tr>
                    <td><?php echo __('Last Name'); ?></td>
                    <td><?php echo $this->Form->input('last_name');?></td>
                </tr>
                <tr>
                    <td><?php echo __('Employee Id'); ?></td>
                    <td><?php echo $this->Form->input('employee_id',array('type'=>'text'));?></td>
                </tr>
                <tr>
                    <td><?php echo __('Technology'); ?></td>
                    <td>
                        <?php
                        echo $this->Form->input('technology_id',
                            array(
                                'options' => $technologies,
                                'selected'=>$this->request->data['Technology']['id'],
                                'empty' => '(Choose One)'
                            )
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Salary'); ?></td>
                    <td><?php echo $this->Form->input('salary');?></td>
                </tr>
                <tr>
                    <td><?php echo __('Work Experience'); ?></td>
                    <td><?php echo $this->Form->input('work_experience');?></td>
                </tr>
                <tr>
                    <td><?php echo __('Is Verified'); ?></td>
                    <td><?php echo $this->Form->input('is_verified');?></td>
                </tr>
                <tr>
                    <td><?php echo __('Is Active'); ?></td>
                    <td><?php echo $this->Form->input('is_active');?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><?php echo $this->Form->submit(__('Submit', true), array('div' => false, 'class' => 'btn btn-primary'));
                        echo '&nbsp;&nbsp;';
                        echo $this->Html->link(__('Cancel', true), 'javascript: void(0);', array('onclick' => 'javascript:history.go(-1);', 'class' => 'btn', 'title' => 'Cancel'))
                        ?></td>
                </tr>
            </table>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>

