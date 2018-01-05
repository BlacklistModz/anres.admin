<?php

$this->slideshow[] = array(
	'url' => 'https://i.annihil.us/u/prod/marvel/i/mg/a/30/5973f2b9dcb86.jpg',
	'title' => 'Thor: Ragnarok', // Guardians of the Galaxy Vol. 2
	'cover_url' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjMyNDkzMzI1OF5BMl5BanBnXkFtZTgwODcxODg5MjI@._V1_UX182_CR0,0,182,268_AL_.jpg',
);

$this->slideshow[] = array(
	'url' => 'https://i.annihil.us/u/prod/marvel/i/mg/4/60/595d549ee4815.jpg',
	'title' => 'Spider-Man: Homecoming', // Guardians of the Galaxy Vol. 2
	'cover_url' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTk4ODQ1MzgzNl5BMl5BanBnXkFtZTgwMTMyMzM4MTI@._V1_UX182_CR0,0,182,268_AL_.jpg',
);
$this->slideshow[] = array(
	'url' => 'https://i.annihil.us/u/prod/marvel/i/mg/3/20/5980a90d3b116.jpg',
	'title' => 'Ant-Man and the Wasp', // Guardians of the Galaxy Vol. 2
	'cover_url' => 'https://images-na.ssl-images-amazon.com/images/M/MV5BNWM4MWExOTUtNDk1MS00YmRhLWI0NzItZmY3MDE2ZjZkOGIwXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_UY268_CR3,0,182,268_AL_.jpg',
);

$this->slideshow[] = array(
	'url' => 'https://i.annihil.us/u/prod/marvel/i/mg/a/20/5956ef9be32c5.jpg',
	'title' => 'Doctor Strange',
	'cover_url' => 'https://i.annihil.us/u/prod/marvel/i/mg/3/50/57fd2d2084523/portrait_incredible.jpg',
);


// 

$arr = array();
foreach ($this->slideshow as $val) {
	$arr[] = array(
		'src'=>  !empty($val['url']) ? $val['url']:'',
		'style' => !empty($val['style']) ? $val['style']: 1,
		'title' => !empty($val['title']) ? $val['title']: '',
		'cover_url' => !empty($val['cover_url']) ? $val['cover_url']: '',
		'caption' => array(
			'title' => !empty($val['caption']['title']) ? $val['caption']['title']: '',
			'text' => !empty($val['caption']['text']) ? $val['caption']['text']: '',
		),
		'link' => !empty($val['caption']['link']) ? $val['caption']['link']: ''
	);
}



?>
<section id="slideshow-container" class="module"><div class="container" data-plugins="slideshow" data-options="<?=$this->fn->stringify( array('effect'=>'slide') ) ?>">

<div class="" style="width: 817px;position: relative;">
	<div class="slide-header"><ul>
		<?php foreach ($arr as $key => $value) { ?>
		<li class="clearfix">
	
			<div class="slide-ratings rfloat mlm">
                <span class="ratingValue">8.5</span>/<span>10</span>
            </div>

			<h1><?=$value['title']?>&nbsp;<span id="titleYear">(<a href="/year/2016/?ref_=tt_ov_inf">2016</a>)</span></h1>
	        <div class="subtext"><?php

	        	echo '<span>G</span>';
	        	echo '<span class="ghost">|</span>';
	        	echo '<time itemprop="duration" datetime="PT115M">1h 55min</time>';

	        	echo '<span class="ghost">|</span>';
	        	echo '<a href="/genre/Action?ref_=tt_ov_inf"><span class="itemprop" itemprop="genre">Action</span></a>';
	        	echo ', <a href="/genre/Adventure?ref_=tt_ov_inf"><span class="itemprop" itemprop="genre">Adventure</span></a>';

	        	echo '<span class="ghost">|</span>';
	        	echo '<a href="/title/tt1211837/releaseinfo?ref_=tt_ov_inf" title="See more release dates">27 October 2016 (Thailand)</a>';
	        	 
	        ?></div>
		</li>
        <?php } ?>
    </ul></div>

	<div class="slideshow" id="slideshow">

	<!-- <div class="slide-border-left"></div> -->

	<ul id="slide-image" class="slide-image">
		<?php 
		foreach ($arr as $key => $value) {

			echo '<li class="item-'.$key.'">';

				# image
				$cls = 'stage';

				echo !empty($value['link'])
					? '<a class="'.$cls.'" href="'.$value['link'].'">'
					: '<div class="'.$cls.'">';

					echo '<div class="img" style="background-image:url('.$value['src'].')"></div>';
				
				echo !empty($value['link']) ? '</a>':'</div>';
				// end: image

				
			echo '</li>';
		} ?>
	</ul>
	
	<?php 

	# caption
	echo '<div class="slider-caption-container">';
		// echo '<div class="slider-caption-left"></div>';

		echo '<ul class="slider-caption-content">';
		foreach ($arr as $key => $value) {
			
			echo '<li class="slider-caption">';
			// if( !empty($value['caption']['title']) || !empty($value['caption']['text']) ){				

				// caption: title
				/*if( !empty($value['caption']['title']) ){
					echo '<h2 class="title">'.$value['caption']['title'].'</h2>';
				}

				// caption: text
				if( !empty($value['caption']['text']) ){ 
				echo '<p class="text"'.!empty($section['body_style'])? ' style="'.$section['body_style'].'"':'' .'>'.$value['caption']['text'].'</p>';
				}*/

				echo '<img src="'.$value['cover_url'].'" title="Doctor Strange" alt="Doctor Strange">';
			
			// }
			echo '</li>';
		}
		echo '</ul>';

		
	echo '</div>';

	/*echo '<div class="slider-caption-right next">'.
		'<div class="decors-wrap"></div>'.
	'</div>';*/
	?>

	<?php if( count($arr)>1 ){ ?>

	<!-- <a class="prevnext prev"><i class="icon-angle-left"></i></a> -->
	<!-- <a class="prevnext next"><i class="icon-angle-right"></i></a> -->

	<nav class="dotnav">
		<ul>
			<?php foreach ($arr as $key => $value) {
				echo '<li><a class="dotnav-item">'.($key+1).'</a></li>';
			} ?>
		</ul>
	</nav>
	<?php } ?>


	</div>
	<!-- End: #slideshow -->
</div>

</div></section>