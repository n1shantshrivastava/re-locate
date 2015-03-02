<?php
echo $this->Html->script(array('validations'), false);
?>

<div class="users form">
    <section id="forms">
        <div class="page-header">
            <h1>Change Password</h1>
        </div>

        <div class="row">
            <div class="span10 offset1">
                <?php
                echo $this->Form->create('User', array(
                    'class' => "form-horizontal well",
                    'inputDefaults' => array('label' => false, 'div' => false)
                ));
                echo $this->Form->hidden('id', array('value' => $loggedInUserId));
                ?>
                <div class="form-actions">
                    <div class="page-header">
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="password">Enter current Password</label>

                        <div class="controls">
                            <?php echo $this->Form->input('password',array('id'=>'UserChangePassword'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="new_password">Enter new Password</label>

                        <div class="controls">
                            <?php echo $this->Form->input('new_password',array('type' => 'password'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="password">Confirm new Password</label>

                        <div class="controls">
                            <?php echo $this->Form->input('confirm_password',array('type' => 'password'));?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                    <a href="/users/dashboard" class="btn">Cancel</a>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </section>
</div>