<div id="mainContainer" class="clearfix" data-plugins="main">
	<div role="main">
		<div class="span12">
			<div role="toolbar" class="mtm">
				<h2 class="mbl"><i class="icon-user"></i> <?=$this->item['fullname']?></h2>
			</div>
			<div class="uiBoxWhite pam">
				<ul>
					<h2 class="fwb"><i class="icon-info-circle"></i> Infomation</h2>
					<?php
					$a[] = array('key'=>'fullname', 'label'=>'Name', 'icon'=>'id-card');
					$a[] = array('key'=>'affiliation', 'label'=>'Affiliation', 'icon'=>'university');
					$a[] = array('key'=>'region', 'label'=>'Region', 'icon'=>'flag');
					$a[] = array('key'=>'address', 'label'=>'Address', 'icon'=>'home');
					$a[] = array('key'=>'presentation_type', 'label'=>'Presentation type', 'icon'=>'desktop');
					$a[] = array('key'=>'submission_type', 'label'=>'Submission type', 'icon'=>'file');
					$a[] = array('key'=>'created', 'label'=>'Registered date', 'icon'=>'registered');
					$a[] = array('key'=>'email', 'label'=>'E-mail', 'icon'=>'envelope-o');

					foreach ($a as $key => $value) {
						if( empty($this->item[$value['key']]) ) continue;
					// if ($value['key'] == 'title'){
					// 	$this->item[$value['key']] = $this->item[$value['key']]. ' '.$this->item['firstname']. ' '.$this->item['lastname'];
					// }
						if ($value['key'] == 'address'){
							$this->item[$value['key']] = $this->item[$value['key']].' '.$this->item['district']. ' '.$this->item['province']. ' '.$this->item['postal'];
						}
						if ($value['key'] == 'created'){
						// $this->item[$value['key']] = $this->fn->q('time')->live($this->item[$value['key']]);
							$this->item[$value['key']] = date("F j, Y (h:i:s A)", strtotime($this->item[$value['key']]));
						}
						echo '<li class="mtm">
						<i class="icon-'.$value['icon'].'"></i>
						<span class="fwb">'.$value['label'].'</span> : '.$this->item[$value['key']].'
						</li>';
					}
					?>
				</ul>
			</div>
			<div class="uiBoxWhite pam mtm">
				<h3 class="fwb"><i class="icon-file-text-o"></i> Presentation</h3>
				<ul>
					<li class="mtm"><span class="fwb">Title : </span><?= !empty($this->item['presentation_title']) ? $this->item['presentation_title'] : "-" ?></li>
					<li class="mtm"><span class="fwb">Descreption : </span>
						<div class="post-content editor-content"><?= !empty($this->item['presentation_desc']) ? $this->item['presentation_desc'] : "-" ?></div>
					</li>
					<li>
						<?php 
						if( !empty($this->item['presentation_filename']) ){
							echo '<a href="'.$this->item['presentation_path'].'" class="btn btn-blue" target="_blank">Download as '.$this->item['presentation_filename'].'</a>';
						}
						if( !empty($this->item['presentation_url']) ){
							echo '<a href="'.$this->item['presentation_url'].'" target="_blank" class="btn btn-blue">Download Full Article</a>';
						}
						?>
					</li>
				</ul>
			</div>
			<div class="uiBoxWhite pam mtm">
				<h3 class="fwb"><i class="icon-send"></i> Send Mail</h3>
				<table class="mtm" width="100%">
					<tr>
						<td class="tac" width="33.33%">
							<ul>
								<li><label class="label fwb">จดหมายแจ้งนักวิจัยว่าเราได้รับบทความแล้ว และบทความอยู่ระหว่างการพิจารณา</label></li>
								<li class="mts">
									<a data-plugins="dialog" href="<?=URL?>/registration/sendmail/<?=$this->item['uid']?>/consider" class="btn btn-orange"><i class="icon-send"></i> SEND</a>
								</li>
							</ul>
						</td>
						<td class="tac" width="33.33%">
							<ul>
								<li><label class="label fwb">จดหมายตอบรับนักวิจัยให้ร่วมประชุม และให้ไปดาวน์โหลดเอกสารอื่นเพิ่ม</label></li>
								<li class="mts">
									<a data-plugins="dialog" href="<?=URL?>/registration/sendmail/<?=$this->item['uid']?>/confirm" class="btn btn-green"><i class="icon-send"></i> SEND</a>
								</li>
							</ul>
						</td>
						<td class="tac" width="33.33%">
							<ul>
								<li><label class="label fwb">ข้อความบอกให้นักวิจัย Submit Full MS ในระบบ EVISE ของวารสาร</label></li>
								<li class="mts">
									<a data-plugins="dialog" href="<?=URL?>/registration/sendmail/<?=$this->item['uid']?>/evise" class="btn btn-blue"><i class="icon-send"></i> SEND</a>
								</li>
							</ul>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>