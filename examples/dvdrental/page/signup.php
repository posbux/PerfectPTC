<?php
class page_signup extends Page {
    function init(){
        parent::init();

        if($this->api->auth->isLoggedIn())$this->api->redirect('video');

        $model=$this->add('Model_Customer');
        $model->addField('password')->type('password')->mandatory(true);

        $form = $this->add('MVCForm');
        $form->setModel($model);
        $form->addField('password','confirm_password');
        $form->addSubmit();

        $form->onSubmit(function($form){
            if($form->get('password') != $form->get('confirm_password'))
                throw $form->exception('Passwords do not match')->setField('confirm_password');

            $form->set('password',
                $form->api->auth->encryptPassword($form->get('password'),$form->get('email')));

            $form->update();

            $form->js()->hide('slow')->univ()->successMessage('Registered successfully')->execute();
        });
    }
}

