<div class="span4"></div>
<div class="span4">
    <div class="hero-unit">
        <?php
        echo $this->Form->create('User' , array('url' => array('plugin' => false , 'controller' => 'users' , 'action' => ''))); ?>
        <fieldset>
            <legend><?php echo __('User Login'); ?></legend>
            <?php

            echo $this->Form->input('username', array('id' => 'username', 'class' => 'inputLogin'));
            echo $this->Form->input('password', array('id' => 'password'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
</div>
<div class="span4"></div>
