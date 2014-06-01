<?php
echo $this->Html->script(array('validations'), false);
?>

<div class="users form" xmlns="http://www.w3.org/1999/html">
    <section id="forms">
        <div class="page-header">
            <h3>Create User <a href="javascript:window.history.back();" class="pull-right backButton"></a></h3>
        </div>

        <div class="row">
            <div class="span10 offset1">
                <?php
                echo $this->Form->create('User', array(
                    'class' => "form-horizontal well",
                    'inputDefaults' => array('label' => false, 'div' => false)
                )); ?>
                <div class="form-actions">
                    <div class="page-header">
                        <h3>Personal information</h3>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="userName">Email Id</label>

                        <div class="controls">
                            <?php echo $this->Form->input('username', array('placeholder'=>'Enter Email Id'));
                            echo $this->Html->image('indicator.gif', array('id' => 'busy-indicator'));
                            echo $this->Html->image('available.png', array('id' => 'available'));
                            echo $this->Html->image('unavailable.gif', array('id' => 'unavailable'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="password">Password</label>

                        <div class="controls">
                            <?php echo $this->Form->input('password',array('placeholder'=>'Enter Password'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="first_name">First Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('first_name',array('placeholder'=>'Enter First Name'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="last_name">Last Name</label>

                        <div class="controls">
                            <?php echo $this->Form->input('last_name', array('placeholder'=>'Enter Last Name'));?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="employee_id">Employee id</label>

                        <div class="controls">
                            <?php echo $this->Form->input('employee_id', array('type' => 'text','placeholder'=>'Enter Employee Id'));?>
                        </div>
                    </div>
                </div>

                <!--Project Reequirements : start-->
                <div class="form-actions">
                    <div class="page-header">
                        <h3>Technical Information</h3>
                    </div>

                    <div class="control-group info">
                        <label class="control-label" for="technology">Technology</label>
                        <div class="controls">
                            <?php
                            echo $this->Form->input('technology_id', array('options' => $technologies));
                            ?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="salary">Salary</label>
                        <div class="controls">
                            <?php
                            echo $this->Form->input('salary',array('placeholder'=>'Enter Annual Salary'));
                            ?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="work_experience">Work Experience</label>
                        <div class="controls">
                            <?php
                            echo $this->Form->input('work_experience',array('placeholder'=>'Enter Total Work Experience'));
                            ?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="role_id">Role</label>
                        <div class="controls">
                            <?php
                            echo $this->Form->input('role_id', array('options' => $roles));
                            ?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="is_verified">Verified</label>
                        <div class="controls">
                            <?php echo $this->Form->input('is_verified');?>
                        </div>
                    </div>
                    <div class="control-group info">
                        <label class="control-label" for="is_active">Active</label>
                        <div class="controls">
                            <?php echo $this->Form->input('is_active');?>
                        </div>
                    </div>
                </div>
                <!--Project Reequirements : end-->

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="/users/all_users" class="btn">Cancel</a>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </section>
</div>