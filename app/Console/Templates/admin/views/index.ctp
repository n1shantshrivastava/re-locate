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
<div class="page-header clearfix">
    <h1 class="pull-left"><?php echo "<?php echo __('{$pluralHumanName}');?>";?></h1>
    <a href="/<?php echo $pluralHumanName;?>/add" class="pull-right">Add New <?php echo $singularHumanName;?></a>
</div>
<div class="row">
    <div class="span12">
	    <table class="table">
            <thead>
                <tr>
                    <th><?php echo '#'; ?></th>
                    <?php  foreach ($fields as $field):?>
                        <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
                    <?php endforeach;?>
                    <th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
                </tr>
            </thead>
            <tbody>
	            <?php
    	            echo "<?php
    	                 \$count = 1 ;
	                     foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
    	            echo "\t<tr>\n";
                    echo "\t\t<td>\n\t\t\t<?php echo \$count; ?>\n\t\t</td>\n";
           		    foreach ($fields as $field) {
        	    		$isKey = false;
        	    		if (!empty($associations['belongsTo'])) {
        	    			foreach ($associations['belongsTo'] as $alias => $details) {
        	    				if ($field === $details['foreignKey']) {
        	    					$isKey = true;
        	    					echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
        	    					break;
        			    		}
        		    		}
       	        		}
            			if ($isKey !== true) {
        				    echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
    			        }
    		        }

	    	        echo "\t\t<td class=\"actions\">\n";
    		        echo "\t\t\t<?php echo \$this->Html->link(__(''), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'icon-eye-open')); ?>\n";
    	 	        echo "\t\t\t<?php echo \$this->Html->link(__(''), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'icon-pencil')); ?>\n";
    	 	        echo "\t\t\t<?php echo \$this->Form->postLink(__(''), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'icon-trash'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
    		        echo "\t\t</td>\n";
    	            echo "\t</tr>\n";

    	            echo "<?php
    	            \$count++;
    	            endforeach; ?>\n";
	            ?>
            </tbody>
	    </table>
	    <p>
	    <?php echo "<?php
	        echo \$this->Paginator->counter(array(
	        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	        ));
	        ?>";
        ?>
	    </p>
	    <div class="paging">
	        <?php
		        echo "<?php\n";
		        echo "\t\techo \$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));\n";
		        echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
		        echo "\t\techo \$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));\n";
		        echo "\t?>\n";
	        ?>
	    </div>
    </div>
</div>