<?php
class Model_Rental extends Model_Table {
    public $entity_code='rental';
    function init(){
        parent::init();

        $this->addField('customer_id')->refModel('Model_Customer');
        $this->addField('dvd_id')->refModel('Model_DVD');
        $this->addField('date_rented')->defaultValue(date('Y-m-d'))->type('date');
        $this->addField('date_returned')->type('date');
        
        $this->addField('is_returned')->type('boolean');
    }
    function returnMovie(){
        $this
            ->set('date_returned',date('Y-m-d'))
            ->set('is_returned',true)
            ->update();
    }
}
