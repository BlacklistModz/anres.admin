<div id="mainContainer" class="clearfix" data-plugins="main">
	<div role="main" class="span12">
		<div role="toolbar" class="mtm">
			<h3 class="mbl"><i class="icon-user"></i> <?=$this->item['fullname']?></h3>
		</div>
		<div class="uiBoxWhite pam">
			<ul>
				<?php 
				$a[] = array('key'=>'gender', 'label'=>'Genger', 'icon'=>'venus-mars');
				$a[] = array('key'=>'email', 'label'=>'Email', 'icon'=>'mail');

				foreach ($a as $key => $value) {
					if( empty($this->item[$value['key']]) ) continue;

					echo '<li class="mt">
								<i class="icon-'.$value['icon'].'"></i>
								<span class="fwb">'.$value['label'].'</span> : '.$this->item[$value['key']].'
						</li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>