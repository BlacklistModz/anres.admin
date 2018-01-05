<?php

$nav = array();
$nav[] = array('name'=>'Schedule');
$nav[] = array('name'=>'Program');
$nav[] = array('name'=>'Plenary lecturers');
$nav[] = array('name'=>'Registration');
$nav[] = array('name'=>'Venue');


?><div id="main-nav-wrapper">

	<div class="container main-nav">
		<h1 class="logo-wrapper">
			<a class="messenger-logo" href="/" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"></a>
		</h1>
		<nav class="main-menu"><?php

		foreach ($nav as $key => $value) {
			echo '<a class="main-nav-item " href="#visitor-engagement" du-smooth-scroll="" du-scrollspy="" class="active">'.$value['name'].'</a>';
		}
		?></nav>
	</div>
</div>