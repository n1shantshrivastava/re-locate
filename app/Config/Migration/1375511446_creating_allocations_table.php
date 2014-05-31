<?php
class CreatingAllocationsTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     * @access public
     */
    public $description = '';

    /**
     * Actions to be performed
     *
     * @var array $migration
     * @access public
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'allocations' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                    'project_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11),
                    'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11),
                    'percentage_of_allocation' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'salary_cost' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'cost_a' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'cost_b' => array('type' => 'integer', 'null' => true, 'default' => NULL),
                    'start' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'end' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                )
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'allocations'
            )
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction) {
        return true;
    }
}
