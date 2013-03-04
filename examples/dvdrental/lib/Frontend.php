<?php
class Frontend extends ApiFrontend {
    function init(){
        parent::init();

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
        $this->dbConnect();

        $this->auth=$this->add('RentalAuth');

        $menu = $this->add('Menu',null,'Menu');
        if($this->auth->isLoggedIn()){
            $menu->addMenuItem('video','Home');
            $menu->addMenuItem('account');
            $menu->addMenuItem('logout');
        }else{
            $menu->addMenuItem('index','Home');
        }
        $menu->addMenuItem('admin');
    }
    function page_admin($p){
        header('Location: '.$this->pm->base_path.'admin');
        exit;
    }
}
