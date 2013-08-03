<?php
class CreatingTechnologiesTable extends CakeMigration {

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
                'technologies' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                    'stream_name' => array('type' => 'string','length' => 255, 'null' => true, 'default' => null),
                    'slug' => array('type' => 'string','length' => 255, 'null' => true, 'default' => null),
                    'stream_type' => array('type' => 'string','length' => 255, 'null' => true, 'default' => null),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
            )
        ),
        'down' => array(
            'drop_table' => array(
                'technologies'
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

            $technologyModel = $this->generateModel('Technology');
            $technologyData = array(
                array('stream_name' => 'PHP', 'slug'=>'php', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Ruby On Rails', 'slug'=>'ruby-on-rails', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Java', 'slug'=>'java', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => '.Net', 'slug'=>'dot-net', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Iphone', 'slug'=>'iphone','created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Android', 'slug'=>'android', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Frontend', 'slug'=>'frontend', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'UI/UX', 'slug'=>'ui-ux', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Business Analyst', 'slug'=>'business-analyst', 'created' => 'NOW()','modified' => 'NOW()'),
                array('stream_name' => 'Quality Analyst', 'slug'=>'quality-analyst', 'created' => 'NOW()','modified' => 'NOW()')
            );

            $technologyModel->saveAll($technologyData);

        }
        return true;
    }
}
