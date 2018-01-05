<nav class="container breadcrumb">
	<ol>
		<li><a href="/"><i class="icon-home"></i></a></li>
		<li class="active">Contact Us</li>
	</ol>

</nav>
<section  id="products-filter" class="container module products-filter">
	<div class="row">

		<div class="span8">
			<div>

				<h3 class="fwb">GET IN TOUCH</h3>
				<p>If you have other questions, please fill out the following form to contact us or fill up our form. Thank you.</p>
				<p>Fields with * are required.</p>

				<div class="mvl">
					<?php require('sections/contact.php'); ?>
				</div>

			</div>

			<div class="uiBoxWhite pal">
				<h4 class="fwb"><?=$this->system['name']?></h4>

				<?php if( !empty($this->system['address']) ) { ?>
				<p class="mvs"><i class="icon-location-arrow"></i> <?=$this->system['address']?></p>
				<?php } ?>

				<?php if( !empty($this->system['phone']) ) { ?>
				<p class="mvs"><i class="icon-phone"></i> <a href="tel:<?=$this->system['phone']?>"><?=$this->system['phone']?></a></p>
				<?php } ?>

				<?php if( !empty($this->system['email']) ) { ?>
				<p class="mvs"><i class="icon-envelope-o"></i> <a href="mailto:<?=$this->system['email']?>"><?=$this->system['email']?></a></p>
				<?php } ?>

				<?php if( !empty($this->system['mobile_phone']) ) { ?>
				<p class="mvs"><i class="icon-mobile"></i> <a href="tel:<?=$this->system['mobile_phone']?>"><?=$this->system['mobile_phone']?> (Mobile)</a></p>
				<?php } ?>

				<?php if( !empty($this->system['fax']) ) { ?>
				<p class="mvs"><i class="icon-fax"></i> <?=$this->system['fax']?> (FAX)</p>
				<?php } ?>
			</div>
		</div>

		<div class="span4">
		
		</div>

	</div>
</section>