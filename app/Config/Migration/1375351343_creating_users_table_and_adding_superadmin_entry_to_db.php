<?php
class CreatingUsersTableAndAddingSuperadminEntryToDb extends CakeMigration {

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
                'users' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                    'technology_id' => array('type' => 'integer', 'null' => false, 'default' => 0, 'length' => 36),
                    'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                    'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
                    'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                    'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                    'employee_id' => array('type' => 'string', 'null' => false, 'default' => 0, 'length' => 255),
                    'salary' => array('type' => 'string', 'default' => NULL, 'length' => 255),
                    'work_experience' => array('type' => 'string', 'default' => NULL, 'length' => 255),
                    'role_type' => array('type' => 'string', 'default' => 0, 'length' => 255),
                    'is_active' => array('type' => 'boolean', 'default' => 0),
                    'is_verified' => array('type' => 'boolean', 'default' => 0),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
                'roles' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                    'name' => array('type' => 'string', 'null' => false, 'length' => 255),
                    'slug' => array('type' => 'string', 'null' => false, 'length' => 255),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'users', 'roles'
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
        if ($direction == 'up') {
            $userModel = $this->generateModel('User');
            $roleModel = $this->generateModel('Role');
            if (!class_exists('Auth')) {
                App::uses('AuthComponent', 'Controller/Component');
            }

            $adminRole = array(
                'Role' => array(
                    'name' => 'Administrator',
                    'slug' => 'admin',
                    'is_active' => 1,
                )
            );

            if ($roleModel->save($adminRole)) {
                $this->log('>>> Inside Migrations | SUCCESS : Role Entry for super-admin done.');
            } else {
                $this->log('>>> Inside Migrations | FAILED : Role Entry for super-admin could not be done.');
            }

            $adminUser = array(
                'technology_id' => 0,
                'username' => 'admin@relocate.com',
                'password' => AuthComponent::password('relocate@2013'),
                'first_name' => 'Administrator',
                'last_name' => ' ',
                'employee_id' => '0',
                'role_type' => '1',
                'is_active' => '1',
                'is_verified' => '1',
            );

            if ($userModel->saveAll($adminUser)) {
                $this->log('>>> Inside Migrations | SUCCESS : Super-Admin entry done.');
            } else {
                $this->log('>>> Inside Migrations | FAILED : Super-Admin entry could not be done.');
            }
        }
        return true;
    }
}
