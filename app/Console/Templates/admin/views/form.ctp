<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(function(){
        <?php
            foreach ($fields as $js_field) {
                if (strpos($action, 'add') !== false && $js_field == $primaryKey) {
                    continue;
                } elseif (!in_array($js_field, array('created', 'modified', 'updated'))) {
        ?>
        jQuery("#<?php echo $modelClass.str_replace(" ","",Inflector::humanize(Inflector::underscore($js_field)));?>").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
        <?php
                }
            }
        ?>
    });
    /* ]]> */
</script>
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <?php if (strpos($action, 'add') === false): ?>
                <li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
                <?php endif;?>
                <li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index'));?>";?></li>
                <?php
                $done = array();
                foreach ($associations as $type => $data) {
                    foreach ($data as $alias => $details) {
                        if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                            echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
                            echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
                            $done[] = $details['controller'];
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="hero-unit">
            <h2><?php echo "<?php  echo __('{$singularHumanName}');?>";?></h2>
            <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('inputDefaults' => array('label' => false, 'div' => false)));?>\n";?>
            <table class="table">
                <?php
                foreach ($fields as $field) {
                    if (strpos($action, 'add') !== false && $field == $primaryKey) {
                        continue;
                    } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                        echo "\t\t<tr>\n\t\t\t<td><?php echo __('" . Inflector::humanize(Inflector::underscore($field)) . "'); ?></td>\n";
                        echo "\t\t<td><?php echo \$this->Form->input('{$field}');?></td>\n\t\t</tr>\n";
                    }
                }
                if (!empty($associations['hasAndBelongsToMany'])) {
                    foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                        echo "\t\t<tr>\n\t\t\t<td><?php echo __('" . Inflector::humanize(Inflector::underscore($assocName)) . "'); ?></td>\n";
                        echo "\t\t<td><?php echo \$this->Form->input('{$assocName}');?></td>\n\t\t</tr>\n";
                    }
                }
                echo "\t\t<tr><td>&nbsp;</td>";
                echo "\t\t<td><?php echo \$this->Form->submit(__('Submit',true),array('div' => false, 'class' => 'btn btn-primary'));
                            echo '&nbsp;&nbsp;';
                            echo \$this->Html->link(__('Cancel',true),'javascript: void(0);',array('onclick' => 'javascript:history.go(-1);', 'class' => 'btn', 'title' => 'Cancel'))
                        ?></td></tr>\n";
                ?>
            </table>
            <?php
            echo "<?php echo \$this->Form->end();?>\n";
            ?>
        </div>
    </div>
</div>

