<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(function(){
                jQuery("#UserUsername").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserPassword").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserPhone").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserImei").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserName").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserUserType").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserIsVerified").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
                jQuery("#UserIsActive").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
            });
    /* ]]> */
</script>
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
                            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="hero-unit">
            <h2><?php  echo __('User');?></h2>
            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false, 'div' => false)));?>
            <table class="table">
                		<tr>
			<td><?php echo __('Username'); ?></td>
		<td><?php echo $this->Form->input('username');?></td>
		</tr>
		<tr>
			<td><?php echo __('Password'); ?></td>
		<td><?php echo $this->Form->input('password');?></td>
		</tr>
		<tr>
			<td><?php echo __('Phone'); ?></td>
		<td><?php echo $this->Form->input('phone');?></td>
		</tr>
		<tr>
			<td><?php echo __('Imei'); ?></td>
		<td><?php echo $this->Form->input('imei');?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
		<td><?php echo $this->Form->input('name');?></td>
		</tr>
		<tr>
			<td><?php echo __('User Type'); ?></td>
		<td><?php echo $this->Form->input('user_type');?></td>
		</tr>
		<tr>
			<td><?php echo __('Is Verified'); ?></td>
		<td><?php echo $this->Form->input('is_verified');?></td>
		</tr>
		<tr>
			<td><?php echo __('Is Active'); ?></td>
		<td><?php echo $this->Form->input('is_active');?></td>
		</tr>
		<tr><td>&nbsp;</td>		<td><?php echo $this->Form->submit(__('Submit',true),array('div' => false, 'class' => 'btn btn-primary'));
                            echo '&nbsp;&nbsp;';
                            echo $this->Html->link(__('Cancel',true),'javascript: void(0);',array('onclick' => 'javascript:history.go(-1);', 'class' => 'btn', 'title' => 'Cancel'))
                        ?></td></tr>
            </table>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>

