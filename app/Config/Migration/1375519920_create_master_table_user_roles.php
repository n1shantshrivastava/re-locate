<?php
class CreateMasterTableUserRoles extends CakeMigration {

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
				'roles' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'role'=>array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'roles'
			),
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
        if ($direction == 'up') {

            $roleModel = $this->generateModel('Role');
            $roleData = array(
                array('id' => 1, 'role' => 'Super Admin', 'slug' => 'super_admin'),
                array('id' => 2, 'role' => 'user', 'slug' => 'user')
            );
            $roleModel->saveAll($roleData);

            //            $query = "SELECT nextval('users_id_seq')";
            //            $userModel->query($query);
            //            $query = "SELECT nextval('users_roles_id_seq')";
            //            $usersRoleModel->query($query);
        }
		return true;
	}
}
