<?php 

$form = new Form();
$form = $form->create()
			 ->elem('div')
			 ->addClass("form-insert");

$form 	->field("title")
		->label('<span class="fwb" style="color:black;">Title</span>')
		->addClass("inputtext")
		->select( $this->titleName )
		->autocomplete('off')
		->value( !empty($this->item['title']) ? $this->item['title'] : '' );

$form 	->field("firstname")
		->label('<span class="fwb" style="color:black;">First Name (Given Name)*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['firstname']) ? $this->item['firstname'] : '' );

$form 	->field("lastname")
		->label('<span class="fwb" style="color:black;">Last Name (Family Name)*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['lastname']) ? $this->item['lastname'] : '' );

$sex = '<ul>
			<li>
				<label class="radio">
					<input type="radio" '.($this->item['gender'] == 'Male' ? 'checked="1"' : '').' name="gender" value="Male"> Male
				</label>
			</li>
			<li>
				<label class="radio">
					<input type="radio" '.($this->item['gender'] == 'Female' ? 'checked="1"' : '').'  name="gender" value="Female"> Female
				</label>
			</li>
		</ul>';

$form 	->field("gender")
		->label('<span class="fwb" style="color:black;">Gender*</span>')
		->text( $sex );

$form 	->field("affiliation")
		->label('<span class="fwb" style="color:black;">Affiliation*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['affiliation']) ? $this->item['affiliation'] : '' );

$form 	->field("address")
		->label('<span class="fwb" style="color:black;">Address*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['address']) ? $this->item['address'] : '' );

$form 	->field("district")
		->label('<span class="fwb" style="color:black;">District*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['district']) ? $this->item['district'] : '' );

$form 	->field("province")
		->label('<span class="fwb" style="color:black;">Province*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['province']) ? $this->item['province'] : '' );

$form 	->field("postal")
		->label('<span class="fwb" style="color:black;">Postal / Zip Code**</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->value( !empty($this->item['postal']) ? $this->item['postal'] : '' );

$form 	->field("region")
		->label('<span class="fwb" style="color:black;">Country / Region*</span>')
		->addClass("inputtext")
		->autocomplete('off')
		->select( $this->country, 'name', 'name' )
		->value( !empty($this->item['region']) ? $this->item['region'] : '' );

$form 	->field("email")
		->label('<span class="fwb" style="color:black;">Email*</span>')
		->addClass("inputtext")
		->autocomplete("off")
		->value( !empty($this->item['email']) ? $this->item['email'] : '' );

$attend = '';
foreach ($this->attend as $key => $value) {
	$ch = '';
	if( !empty($this->item['attend_type']) ){
		if( $this->item['attend_type'] == $value['keyword'] ) $ch =' checked="1"';
	}
	$attend .= '<li><label class="radio"><input'.$ch.' type="radio" name="attend_type" value="'.$value['keyword'].'">'.$value['name'].'</label></li>';
}
$attend = !empty($attend) ? "<ul>{$attend}</ul>" : "";

$form 	->field("attend_type")
		->label('<span class="fwb" style="color:black;">I would like to attend as a*</span>')
		->attr('data-name', 'attend')
		->text( $attend );

$form 	->field("stu_card")
		->label('<span class="fwb" style="color:black;">Please upload your student card*</span>')
		->attr('data-name', 'stu-card')
		->addClass('inputtext')
		->autocomplete('off')
		->type('file')
		->note('(Please upload only PDF file(.pdf) and file size must not more than 2MB.)');

$form 	->field("mou_doc")
		->label('<span class="fwb" style="color:black;">Please upload your MOU Document*</span>')
		->attr('data-name', 'mou_doc')
		->addClass('inputtext')
		->autocomplete('off')
		->type('file')
		->note('(Please upload only PDF file(.pdf) and file size must not more than 2MB.)');

$types = '';
foreach ($this->types as $key => $value) {
	$ch = '';
	if( !empty($this->item['presentation_type']) ){
		if( $value['keyword'] == $this->item['presentation_type'] ) $ch = ' checked="1"';
	}
	$types .= '<li><label class="radio"><input'.$ch.' type="radio" name="presentation_type" value="'.$value['keyword'].'">'.$value['name'].'</label></li>';
}
$types = !empty($types) ? "<ul>{$types}</ul>" : "";

$form 	->field("presentation_type")
		->label('<span class="fwb" style="color:black;">Please choose a presentation types*</span>')
		->attr('data-name', 'types')
		->text( $types );

$submission = '';
foreach ($this->submission as $key => $value) {
	$ch = '';
	if( !empty($this->item['submission_type']) ){
		if( $this->item['submission_type'] == $value['id'] ) $ch = ' checked="1"';
	}
	$submission .= '<li><label class="radio"><input type="radio" name="submission_type" value="'.$value['id'].'">'.$value['name'].'</label></li>';
}
$submission = !empty($submission) ? "<ul>{$submission}</ul>" : "";

$form 	->field("submission_type")
		->label('<span class="fwb" style="color:black;">Please choose a submission types*</span>')
		->attr('data-name', 'submission')
		->text( $submission );

$payment = '';
foreach ($this->payment as $key => $value) {
	$ch = '';
	if( !empty($this->item['payment_type']) ){
		if( $this->item['payment_type'] == $value['id'] ) $ch = ' checked="1"';
	}
	$payment .= '<li><label class="radio"><input'.$ch.' type="radio" name="payment_type" value="'.$value['id'].'">'.$value['name'].'</label></li>';
}
$payment = !empty($payment) ? "<ul>{$payment}</ul>" : "";
$form 	->field("payment_type")
		->label('<span class="fwb" style="color:black;">Payment type*</span>')
		->attr('data-name', 'payment')
		->text( $payment );
?>

<div id="mainContainer" class="clearfix" data-plugins="main">
	<div role="main">
		<div class="span12">
			<div role="toolbar" class="mtm">
				<h3 class="mbl"><i class="icon-paper-plane-o"></i> Registration form</h3>
			</div>
			<div class="uiBoxWhite pam" style="width: 750px;">
				<form class="js-submit-form" action="<?=URL?>save">
					<?=$form->html()?>
					<div class="clearfix mtl">
						<div class="lfloat">
							<a href="<?=URL?>registration/" class="btn btn-red">BACK</a>
						</div>
						<div class="rfloat">
							<button type="submit" class="btn-submit btn btn-blue">SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>