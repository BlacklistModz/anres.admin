<?php

$url = URL .'email/';


?><div class="pal"><div class="setting-header cleafix">

<div class="rfloat">

	<span class=""><a class="btn btn-blue" data-plugins="dialog" href="<?=$url?>add_email"><i class="icon-plus mrs"></i><span><?=$this->lang->translate("Add New")?></span></a></span>

</div>

<div class="setting-title">E-mail</div>
</div>

<section class="setting-section">
	<table class="settings-table admin"><tbody>
		<tr>
			<th class="name">E-mail</th>
			<th class="actions"><?=$this->lang->translate('Action')?></th>
		</tr>

		<?php foreach ($this->data as $key => $item) { ?>
		<tr>
			<td class="name">
				<h3><?=$item['title']?></h3>
			</td>

			<td class="actions whitespace">
				<span class="gbtn">
					<a data-plugins="dialog" href="<?=$url?>edit_email/<?=$item['id'];?>" class="btn btn-orange btn-no-padding"><i class="icon-pencil"></i></a>
				</span>
				<span class="gbtn">
					<a data-plugins="dialog" href="<?=$url?>del_email/<?=$item['id'];?>" class="btn btn-red btn-no-padding"><i class="icon-trash"></i></a>
				</span>
			</td>

		</tr>
		<?php } ?>
	</tbody></table>
</section>
</div>
