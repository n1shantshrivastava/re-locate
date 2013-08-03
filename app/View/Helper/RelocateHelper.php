<?php
App::uses('AppHelper', 'View/Helper');
class RelocateHelper extends AppHelper {
    public $helpers = array();

    public function allocationPercentage() {
        $percentage = array();
        for ($i = 0; $i = 100; $i + 5) {
            $percentage[] = $i;
        }
        return $percentage;
    }
}