<?php

$title = $this->lang->translate('Attend');

$form = new Form();
$form = $form->create()
	// set From
	->elem('div')
	->addClass('form-insert');

$form 	->field("attend_name")
    	->label($this->lang->translate('Name').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value( !empty($this->item['name'])? $this->item['name']:'' );

$form 	->field("attend_keyword")
	    	->label($this->lang->translate('Keyword').'*')
        ->autocomplete('off')
        ->addClass('inputtext')
        ->placeholder('')
        ->value( !empty($this->item['keyword'])? $this->item['keyword']:'' );

$ch = !empty($this->item['is_student']) ? ' checked="1"' : "";
$ch_box = '<label class="checkbox"><input'.$ch.' type="checkbox" name="is_student"> This is Student</label>';
$form 	->field("is_student")
				->text( $ch_box );

$ch = !empty($this->item['is_international']) ? ' checked="1"' : "";
$ch_box = '<label class="checkbox"><input'.$ch.' type="checkbox" name="is_international"> This is International</label>';
$form 	->field("is_international")
				->text( $ch_box );

$ch = !empty($this->item['is_mou']) ? ' checked="1"' : "";
$ch_box = '<label class="checkbox"><input'.$ch.' type="checkbox" name="is_mou"> This is Asean/MOU</label>';
$form 	->field("is_mou")
				->text( $ch_box );

# set form
$arr['form'] = '<form class="js-submit-form" method="post" action="'.URL. 'registration/save_attend"></form>';

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
