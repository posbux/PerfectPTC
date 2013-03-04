<?php
class page_account extends Page {
    function init(){
        parent::init();
        
        $this->api->auth->check();

        $this->add('H1')->set('Edit your account details');

        $model = $this->add('Model_Customer');
        $model->getField('email')->system(true);
        $form=$this->add('Form');
        $form->setModel($model)->load($this->api->auth->get('id'));
        $form->addSubmit();
        if($form->isSubmitted()){
            $form->update();
            $form->js()->univ()->dialogOK('Thank you','Saved successfully')->execute();
        }
    }
}
