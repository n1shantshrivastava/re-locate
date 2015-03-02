<?php
class ChangingTheFieldNameAndDatatypeForRoleTypeToRoleId extends CakeMigration {

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
            'rename_field' => array(
                'users' => array(
                    'role_type' => 'role_id'
                )
            ),
            'alter_field' => array(
                'users' => array(
                    'role_id' => array('type' => 'integer', 'length' => 11)
                )
            )
        ),
        'down' => array(
            'rename_field' => array(
                'users' => array(
                    'role_id' => 'role_type'
                )
            ),
            'alter_field' => array(
                'users' => array(
                    'role_type' => array('type' => 'string', 'length' => 255)
                )
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
