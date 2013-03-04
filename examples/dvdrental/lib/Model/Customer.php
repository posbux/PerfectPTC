<?php
class Model_Customer extends Model_Table {
    public $entity_code='customer';
    
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('email');
    }
}
