<?php 
$form = new Form();
$form = $form->create()
	// set From
	// ->elem('div')
	->method('post')
	->addClass('form-insert js-submit-form uiBoxWhite pal')
	->url(URL.'contact/mail');

$form 	->field("name")
    	->label($this->lang->translate('Name').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value('');

$form 	->field("email")
    	->label($this->lang->translate('Email').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value('');

$form 	->field("phone")
    	->label($this->lang->translate('Phone').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value('');

$form 	->field("subject")
    	->label($this->lang->translate('Subject').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value('');

$form 	->field("detail")
		->label($this->lang->translate('Detail').'*')
		->autocomplete('off')
        ->type('textarea')
		->addClass('inputtext')
		->placeholder('')
		->value('');    

$form   ->submit()
        ->addClass('btn btn-blue btn-submit')
        ->value('Submit');

echo $form->html();
?>