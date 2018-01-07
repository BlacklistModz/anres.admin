<?php

$title = $this->lang->translate('E-mail');

$form = new Form();
$form = $form->create()
	// set From
	->elem('div')
	->addClass('form-insert');

$form 	->field("email_title")
    	->label($this->lang->translate('Title').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value( !empty($this->item['title'])? $this->item['title']:'' );

$form 	->field("email_detial")
	    ->label($this->lang->translate('Detial').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->type('textarea')
        ->attr('data-plugins', 'autosize')
        ->placeholder('')
        ->value( !empty($this->item['detial'])? $this->item['detial']:'' );

# set form
$arr['form'] = '<form class="js-submit-form" method="post" action="'.URL. 'emails/save"></form>';

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

$arr['width'] = 600;

echo json_encode($arr);
