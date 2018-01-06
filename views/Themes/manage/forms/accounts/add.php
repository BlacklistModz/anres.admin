<?php

$title = $this->lang->translate('Administrator');

$form = new Form();
$form = $form->create()
	// set From
	->elem('div')
	->addClass('form-insert');

	$form 	->field("firstname")
					->label($this->lang->translate('Firstname').'*')
					->autocomplete('off')
					->addClass('inputtext')
					->placeholder('')
					->value( !empty($this->item['firstname'])? $this->item['firstname']:'' );

	$form 	->field("lastname")
					->label($this->lang->translate('Lastname').'*')
					->autocomplete('off')
					->addClass('inputtext')
					->placeholder('')
					->value( !empty($this->item['lastname'])? $this->item['lastname']:'' );

	$form 	->field("username")
	    		->label($this->lang->translate('Username').'*')
        	->autocomplete('off')
        	->addClass('inputtext')
        	->placeholder('')
        	->value( !empty($this->item['username'])? $this->item['username']:'' );
  // 
	// $form 	->field("password")
	//     		->label($this->lang->translate('Password').'*')
  //       	->autocomplete('off')
  //       	->addClass('inputtext')
  //       	->placeholder('')
  //       	->value( !empty($this->item['password'])? $this->item['password']:'' );

	$form 	->field("email")
					->label($this->lang->translate('E-mail').'*')
					->autocomplete('off')
					->addClass('inputtext')
					->placeholder('')
					->value( !empty($this->item['email'])? $this->item['email']:'' );

# set form
$arr['form'] = '<form class="js-submit-form" method="post" action="'.URL. 'settings/save_accounts"></form>';

# body
$arr['body'] = $form->html();

# title
if( !empty($this->item) ){
    $arr['title']= "Edit {$title}";
    $arr['hiddenInput'][] = array('name'=>'id','value'=>$this->item['id']);
}
else{
    $arr['title']= "Add {$title}";
}

# fotter: button
$arr['button'] = '<button type="submit" class="btn btn-primary btn-submit"><span class="btn-text">'.$this->lang->translate('Save').'</span></button>';
$arr['bottom_msg'] = '<a class="btn" role="dialog-close"><span class="btn-text">'.$this->lang->translate('Cancel').'</span></a>';

// $arr['width'] = 782;

echo json_encode($arr);
