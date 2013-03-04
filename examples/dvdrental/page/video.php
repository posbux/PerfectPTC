<?php
class page_video extends Page {
    function init(){
        parent::init();
        $this->api->auth->check();

        $this->add('H1')->set('Movies to rent');

        $this->add('Grid')->setModel('Movie');
    }
}
