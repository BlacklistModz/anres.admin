<?php

$title = $this->lang->translate('types');

$form = new Form();
$form = $form->create()
	// set From
	->elem('div')
	->addClass('form-insert');

$form 	->field("types_name")
    	->label($this->lang->translate('Name').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value( !empty($this->item['name'])? $this->item['name']:'' );
$form 	->field("types_name")
			->label($this->lang->translate('Name').'*')
				->autocomplete('off')
				->addClass('inputtext')
				->placeholder('')
				->value( !empty($this->item['name'])? $this->item['name']:'' );
$form 	->field("types_name")
			->label($this->lang->translate('Name').'*')
				->autocomplete('off')
				->addClass('inputtext')
				->placeholder('')
				->value( !empty($this->item['name'])? $this->item['name']:'' );
$form 	->field("types_name")
			->label($this->lang->translate('Name').'*')
				->autocomplete('off')
				->addClass('inputtext')
				->placeholder('')
				->value( !empty($this->item['name'])? $this->item['name']:'' );

# set form
$arr['form'] = '<form class="js-submit-form" method="post" action="'.URL. 'presentation/save_types"></form>';

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
