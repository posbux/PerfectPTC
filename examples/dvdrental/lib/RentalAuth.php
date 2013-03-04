<?php
class RentalAuth extends BasicAuth {
    function init(){
        parent::init();
        $this->setModel('Model_Customer');
    }
}
