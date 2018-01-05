<?php


require_once WWW_FORMS.'customers/add.php';

$steps[] = array('name'=>'1', 'text'=>'ข้อมูลพื้นฐาน');
$steps[] = array('name'=>'2', 'text'=>'รูปถ่าย');
$steps[] = array('name'=>'3', 'text'=>'ข้อมูลการรักษา');

?>
<div class="pal"></div>
<div class="mvl ptm uiInterstitial uiInterstitialLarge uiBoxWhite">
	
	<div class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader"><div class="clearfix uiHeaderTop">
		<div class="rfloat"><div class="uiHeaderActions"></div></div>
		<div><h2 class="uiHeaderTitle" aria-hidden="true">Register Patient</h2></div>
	</div></div>
	
	<div class="phl ptm uiInterstitialContent">
		<?=$this->fn->stepList($steps, 3, 1, 1)?>

		<div class="mtm ptm topborder">
			<?= $form->html() ?>
		</div>
	</div>

	<div class="uiInterstitialBar uiBoxGray topborder"><div class="clearfix"><div class="rfloat">
	<a class="btn" role="button" href="#" rel="async-post">Skip</a>
	<button value="1" class="btn  btn-primary btn-submit" type="submit">Save</button></div>
	<div class="pts"><a href="#"></a></div></div></div>
</div>