<?php
class Admin extends ApiFrontend {

    public $is_admin=true;
    
    function init(){
        parent::init();
        $this->dbConnect();

        $this->addLocation('..',array(
                    'php'=>array(
                        'lib',
                        )
                    ))
            ->setParent($this->pathfinder->base_location);

        $this->addLocation('../atk4-addons',array(
                    'php'=>array(
                        'mvc',
                        'misc/lib',
                        )
                    ))
            ->setParent($this->pathfinder->atk_location);


        $this->add('jUI');
        $this->js()
            ->_load('atk4_univ')
            ->_load('ui.atk4_notify')
            ;

        // Allow user: "admin", with password: "demo" to use this application
        $this->add('BasicAuth')->allow('demo','demo')->check();

        $menu=$this->add('Menu',null,'Menu');
        $menu->addMenuItem('back');
        $menu->addMenuItem('mgr','Manager');

        $this->add('H1',null,'logo')->set('Welcome to DVDRental Admin');

    }
    function page_index($p){
        $this->api->redirect('mgr');
    }
    function page_back($p){
        header('Location: '.dirname($this->pm->base_path));
    }
}
