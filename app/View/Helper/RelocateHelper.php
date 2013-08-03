<?php
App::uses('AppHelper', 'Helper');
class RelocateHelper extends AppHelper {
    public function allocationPercentage() {
        $percentage = array();
        for ($i = 0; $i = 100; $i + 5) {
            $percentage[] = $i;
        }
        return $percentage;
    }
}