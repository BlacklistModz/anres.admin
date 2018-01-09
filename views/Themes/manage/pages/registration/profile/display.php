<div id="mainContainer" class="clearfix" data-plugins="main">
	<div role="main" class="span12">
		<div role="toolbar" class="mtm">
			<h3 class="mbl"><i class="icon-user"></i> <?=$this->item['fullname']?></h3>
		</div>
		<div class="uiBoxWhite pam">
			<ul>
				<?php
				// print_r($this->item);die;
				$a[] = array('key'=>'title', 'label'=>'Name', 'icon'=>'id-card');
				$a[] = array('key'=>'affiliation', 'label'=>'Affiliation', 'icon'=>'university');
				$a[] = array('key'=>'region', 'label'=>'Region', 'icon'=>'flag');
				$a[] = array('key'=>'address', 'label'=>'Address', 'icon'=>'home');
				$a[] = array('key'=>'presentation_type', 'label'=>'Presentation type', 'icon'=>'desktop');
				$a[] = array('key'=>'submission_type', 'label'=>'Submission type', 'icon'=>'file');
				$a[] = array('key'=>'created', 'label'=>'Registered date', 'icon'=>'registered');
				$a[] = array('key'=>'email', 'label'=>'E-mail', 'icon'=>'send');

				foreach ($a as $key => $value) {
					if( empty($this->item[$value['key']]) ) continue;
					if ($value['key'] == 'title'){
						$this->item[$value['key']] = $this->item[$value['key']]. '. '.$this->item['firstname']. ' '.$this->item['lastname'];
					}
					if ($value['key'] == 'address'){
						$this->item[$value['key']] = $this->item[$value['key']].' '.$this->item['district']. ' '.$this->item['province']. ' '.$this->item['postal'];
					}
					if ($value['key'] == 'created'){
						// $this->item[$value['key']] = $this->fn->q('time')->live($this->item[$value['key']]);
						$this->item[$value['key']] = date("F j, Y (h:i:s A)", strtotime($this->item[$value['key']]));
					}
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
