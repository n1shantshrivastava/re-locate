<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Richa Sharma (Webonise Lab)
 * Date: 8/13/12
 * Time: 11:01 AM
 * To change this template use File | Settings | File Templates.
 */
class ExistBehavior extends ModelBehavior {

    /**
     * Initiate Exist behavior
     *
     * @param Model $Model instance of model
     * @param array $config array of configuration settings.
     * @return void
     */
    public function setup(Model $Model, $settings = array() ) {

        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = array(
                'model' => $Model->name
            );
        }
        $this->settings[$Model->alias] = array_merge(
            $this->settings[$Model->alias], (array)$settings);
    }

    public function isExist(& $Model, $query=array()){
        $table = $Model->table;
        $statement= '';

        foreach($query as $key=>$value){
            $statement .= $key."='".$value."' && ";
        }
        $statement = substr($statement, 0, -4);

        $result = $Model->query('SELECT EXISTS ( SELECT * FROM '.$table.' as '.$Model->name.' WHERE '.$statement.') as result');
        $result = (bool)$result[0][0]['result'];

        return $result;
    }
}