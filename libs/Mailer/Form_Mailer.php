<?php

class Form_Mailer
{
 	public function confirmEmail( $data )
 	{
 		return '<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-bottom:1px solid #dcdad8;"><tbody><tr><td>
		<table height="40" width="620" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>
			<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;position:relative;"><tbody><tr>

				<td align="center" valign="bottom" height="30">
					<a href="'.URL.'" title="ไปที่ Home.com" target="_blank" style="display:inline-block;">

						<div style="background-color:#fff;background-image:url('.IMAGES.'logo.png);background-repeat:no-repeat;border-radius:50%;border:4px solid #c11a22;min-height:86px;width:86px"></div>
					</a>

					<div style="min-height:10px;font-size:10px;line-height:10px">&nbsp;</div>
				</td>
			
			</tr></tbody></table>
		</td></tr></tbody></table>
	</td></tr></tbody></table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#f5f3f0"><tbody><tr><td>
		<table width="620" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td align="center">
			<div style="min-height:20px;font-size:20px">&nbsp;</div>

			<table width="600" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #d8d8d8;border-radius:3px;overflow:hidden"><tbody>

				<tr><td style="background:#ffffff;padding:30px 50px 30px 50px">
						
					<table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody>

						<tr><td align="center" style="font-family:helvetica neue,helvetica,sans-serif;font-size:18px;line-height:24px;font-weight:bold;color:#454545">สวัสดี '.$data['name'].'</td></tr>

						<tr><td align="center" style="font-family:helvetica neue,helvetica,sans-serif;font-size:16px;color:#666666;line-height:24px;padding-top:0px">
							ขอบคุณมากที่เข้าร่วม Lampang Home! เพื่อให้การลงทะเบียนเสร็จสิ้น <br/>คุณต้องยืนยันว่าเราได้รับอีเมลถูกต้อง
						</td></tr>
					</tbody></table>

				</td></tr>
				<tr><td width="600" align="center" style="padding:10px;background-color:#ededed;border-top:1px solid #d8d8d8;border-collapse:collapse">
					<a href="'.$data['url'].'" style="background-color:#cb2027;padding:2px 15px 0px 15px;border-bottom:2px solid #971e25;border-radius:3px;height: 36px;display: inline-block;line-height: 36px;color: #fff;text-decoration: none;font-weight: bold;"><span>ยืนยันอีเมลของคุณ</span></a>

				</td></tr>

			</tbody></table>
		</td></tr></tbody></table>
		
		<div style="min-height:30px;font-size:30px">&nbsp;</div>

		<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="background:#ffffff;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-top:1px solid #e3e3e3;border-bottom:1px solid #e3e3e3;border-left:1px solid #e3e3e3;border-right:1px solid #e3e3e3;overflow:hidden"><tbody><tr><td align="center" style="padding:0px">

			<table width="600" border="0" cellpadding="0" cellspacing="0" style="background:#ffffff;border-top:0"><tbody>
				<tr><td colspan="1" height="30" style="font-size:30px;line-height:30px">&nbsp;</td></tr>

				<tr><td align="left" style="font-family:helvetica neue,helvetica,sans-serif;font-size:14px;color:#666666;line-height:20px;padding:0 30px 20px 30px">
					ปุ่มไม่ทำงานใช่ไหม? ลองวางลิงค์นี้ลงในเบราว์เซอร์<wbr>ของคุณ:
				</td></tr>
				<tr><td align="left" style="font-family:helvetica neue,helvetica,sans-serif;font-size:14px;color:#666666;line-height:20px;padding:0 30px 0px 30px">

					<a href="'.$data['url'].'" target="_blank">'.$data['url'].'</a>

				</td></tr>

				<tr><td colspan="1" height="30" style="font-size:30px;line-height:30px">&nbsp;</td></tr>

			</tbody></table>

		</td></tr></tbody></table>

		<div style="min-height:30px;font-size:30px">&nbsp;</div>

		<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse"><tbody><tr><td>

			<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;color:#979797"><tbody>

				<tr>
					<td style="font-family:helvetica,sans-serif;font-size:30px;font-weight:bold;">ลำปางโฮม
					</td>
				</tr>

				<tr><td align="left">
					ซื่อตรง มั่นคง รับผิดชอบ ลำปางโฮม รับฝากขายบ้านและที่ดิน ขายบ้านสร้างเสร็จพร้อมอยู่ ปรับปรุงอสังหาริมทรัพย์ รับสร้างบ้านตามงบประมาณ รับออกแบบบ้านตามงบประมาณ
				</td></tr>
			</tbody></table>			

		</td></tr></tbody></table>

		<div style="min-height:30px;font-size:30px">&nbsp;</div>

	</td></tr></tbody></table>';
 	}

 	public function contact($data) 	{

 		return '<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-bottom:1px solid #dcdad8;"><tbody><tr><td>
		<table height="40" width="620" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>
			<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;position:relative;"><tbody><tr>

				<td align="center" valign="bottom" height="30">
					<a href="'.URL.'" title="ไปที่ '.PAGE_TITLE.'" target="_blank" style="display:inline-block;">

						<div style="background-color:#fff;background-image:url('.IMAGES.'logo.png);background-repeat:no-repeat;min-height: 45px;width: 236px;"></div>
					</a>

					<div style="min-height:10px;font-size:10px;line-height:10px">&nbsp;</div>
				</td>
			
			</tr></tbody></table>
		</td></tr></tbody></table>
	</td></tr></tbody></table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#f5f3f0"><tbody><tr><td>
		<table width="620" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td align="center">
			<div style="min-height:20px;font-size:20px">&nbsp;</div>

			<table width="600" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #d8d8d8;border-radius:3px;overflow:hidden"><tbody>

				<tr><td style="background:#ffffff;padding:30px 50px 30px 50px">
						
					<table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody>

						<tr><td style="font-family:helvetica neue,helvetica,sans-serif;font-size:18px;line-height:24px;font-weight:bold;color:#454545">'.$data['name'].' ได้ส่งข้อความถึงคุณ</td></tr>

						<tr><td><div style="min-height:10px;font-size:10px">&nbsp;</div></td></tr>

						<tr><td style="font-family:helvetica neue,helvetica,sans-serif;font-size:16px;line-height:1.2;color:#454545">'.$data['message'].'</td></tr>

					</tbody></table>

				</td></tr>

				<tr></tr>

			</tbody></table>
		</td></tr></tbody></table>

		<div style="min-height:30px;font-size:30px">&nbsp;</div>



	</td></tr></tbody></table>';

 	}

 	public function sendConfirm($data=array()){
 		return '<p><b>Kasetsart University Research and Development Institute, <br/>
 		Kasetsart University, Bangkok 10900, Thailand.<br/>
 		Tel. 662 5795548, Fax. 662 5611474<br/>
 		E-mail: anresconference@ku.th<br/></b></p>
 		<p></p>
 		Date: '.date("d-m-Y").'
 		<p></p>
 		Title: '.$data['title'].'
 		<p></p>
 		Dear '.$data['fullname'].',
 		<p></p>
 		<p>We appreciated your interest in “International Conference of Agriculture and Natural Resources (ANRES 2018)” on 26-28 April 2018.  Your payment has been received.<b>You can now upload '.$data['submission_type'].' at <a href="http://www.anresconference2018.org/member">http://www.anresconference2018.org/member</a></b> using</p>

 		<p><b>Account: '.$data['username'].'<br/>
 		Password: '.$data['password'].'</b></p>
 		<p></p>
 		<p>Should you have any queries, please immediately contact Secretariat at anresconference@ku.th.</p>
 		<p></p>
 		<p></p>
 		<p>Yours Sincerely,</p>
 		<p></p>
 		<p></p>
 		<p>Assoc. Prof. Dr. Thongchai Suwonsichon,<br/>
 		Director of Kasetsart University Research and Development Institute</p>';
 	}

 	public function sendThenkYou($data){
 		return '<p><b>Kasetsart University Research and Development Institute, <br/>
 		Kasetsart University, Bangkok 10900, Thailand.<br/>
 		Tel. 662 5795548, Fax. 662 5611474<br/>
 		E-mail: anresconference@ku.th<br/></b></p>
 		<p></p>
 		Date: '.date("d-m-Y").'
 		<p></p>
 		Title: '.$data['title'].'
 		<p></p>
 		Dear '.$data['fullname'].',
 		<p></p>
 		<p>We appreciated your interest in “International Conference of Agriculture and Natural Resources (ANRES 2018)” on 26-28 April 2018.  Your payment has been received.</p>
 		<p></p>
 		<p>Should you have any queries, please immediately contact Secretariat at anresconference@ku.th.</p>
 		<p></p>
 		<p></p>
 		<p>Yours Sincerely,</p>
 		<p></p>
 		<p></p>
 		<p>Assoc. Prof. Dr. Thongchai Suwonsichon,<br/>
 		Director of Kasetsart University Research and Development Institute</p>';
 	}

 	public function consider($data){
 		return '<p><b>Kasetsart University Research and Development Institute,<br/>
 		Kasetsart University, Bangkok 10900, Thailand. <br/>
 		Tel. 662 5795548, Fax. 662 5611474<br/>
 		E-mail: anresconference@ku.th</b></p>
 		<p></p>
 		<p>Date: '.date("d/m/Y").'</p>
 		<p></p>
 		<p>Title: '.$data['title'].'</p>
 		<p></p>
 		<p>Dear '.$data['fullname'].',</p>
 		<p></p>
 		<p>Thank you for submitting your '.$data['submission'].' for presentation in International Conference of Agriculture and Natural Resources (ANRES 2018). We will proceed your '.$data['submission'].' to the review process.</p>
 		<p></p>
 		<p>Yours Sincerely,</p>
 		<p></p>
 		<p>Secretariat of ANRES 2018</p>
 		';
 	}
 	public function confirm($data){
 		return '<p><b>Kasetsart University Research and Development Institute,<br/>
 		Kasetsart University, Bangkok 10900, Thailand. <br/>
 		Tel. 662 5795548, Fax. 662 5611474<br/>
 		E-mail: anresconference@ku.th</b></p>
 		<p></p>
 		<p>Date: '.date("d/m/Y").'</p>
 		<p></p>
 		<p>Title: '.$data['title'].'</p>
 		<p></p>
 		<p>Dear '.$data['fullname'].',</p>
 		<p></p>
 		<p>On behalf of International Conference of Agriculture and Natural Resources (ANRES 2018)Committee, I am very pleased to inform you that your '.$data['submission'].'</p>
 		<p>title “'.$data['presentation_title'].'” was accepted for '.$data['presentation'].' presentation. You can login to http://anresconference2018.org for download Invitation letter and others documents.</p>
 		<p>Please see more information for presentation at <a href="http://anresconference2018.org/">http://anresconference2018.org/</a>.
 		We are looking forward to meeting you. </p>
 		<p></p>
 		<p>Yours sincerely,</p>
 		<p></p>
 		<p></p>
 		<p>Assoc. Prof. Dr. Thongchai Suwonsichon,
 		Director of Kasetsart University Research and Development Institute</p>
 		';
 	}
 	public function evise($data){
 		return 'Please use the cover letter <a href="http://anresconference2018.org/download.php">http://anresconference2018.org/download.php</a> and template of manuscript <a href="http://anresconference2018.org/download.php">http://anresconference2018.org/download.php</a> when submit the full manuscript to ANRES at <a href="https://www.journals.elsevier.com/agriculture-and-natural-resources/">https://www.journals.elsevier.com/agriculture-and-natural-resources/</a>';
 	}
}