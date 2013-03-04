<?php
class Model_DVD extends Model_Table {
    public $entity_code='dvd';
    function init(){
        parent::init();

        $this->addField('movie_id')->refModel('Model_Movie');
        $this->addField('code');
    }
    function toStringSQL($source_field, $dest_fieldname){
        return 'concat("DVD#",id,": ",(select name 
                    from movie m,dvd d where m.id=d.movie_id and d.id='.$source_field.')) as '.$dest_fieldname;
    }
}
