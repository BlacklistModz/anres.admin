<?php

$color = '';
if( $this->type == 'consider' ){
	$color = 'orange';
}
elseif( $this->type == 'confirm' ){
	$color = 'green';
}
elseif( $this->type == 'evise' ){
	$color = 'blue';
}

$arr['title'] = 'ยืนยันการส่งอีเมล';
$arr['form'] = '<form class="js-submit-form" action="'.URL. 'registration/sendmail"></form>';
$arr['hiddenInput'][] = array('name'=>'id','value'=>$this->item['uid']);
$arr['hiddenInput'][] = array('name'=>'type', 'value'=>$this->type);
$arr['body'] = "คุณต้องการส่งอีเมลไปยัง <span class=\"fwb\">\"{$this->item['fullname']}\"</span> หรือไม่?";

$arr['button'] = '<button type="submit" class="btn btn-'.$color.' btn-submit"><span class="btn-text"><i class="icon-send"></i> Send</span></button>';
$arr['bottom_msg'] = '<a class="btn btn-red" role="dialog-close"><span class="btn-text">'.$this->lang->translate('Cancel').'</span></a>';

echo json_encode($arr);
