<?php
class page_mgr extends Page {
    function init(){
        parent::init();

        $tabs=$this->add('Tabs');
        $crud=$tabs->addTab('Customers')->add('CRUD');
        $crud->setModel('Customer');
        if($crud->grid){
            $crud->grid->addColumn('prompt','set_password');
            if($_GET['set_password'] && $_GET['value']){
                $auth = $this->add('RentalAuth');
                $model = $auth->getModel()->loadData($_GET['set_password']);
                $model->addField('password');
                $model->set('password',$_GET['value'])->debug()->update();
                $this->js()->univ()->successMessage('Changed password for '.$model->get('email'))
                    ->execute();
            }
        }

        $tabs->addTab('Movies')->add('CRUD')->setModel('Movie');
        $tabs->addTab('DVDs')->add('CRUD')->setModel('DVD');
        $tabs->addTab('Rentals')->add('CRUD')->setModel('Rental');
    }
}
