<section id="featured-products" class="featured-products inner module"><div class="container">
	
	<header class="module-header">
		<div class="clearfix">
			<div class="lfloat"><h2>Featured Properties</h2></div>
			<div class="rfloat mtm"><a href="<?=URL?>property">View all Properties</a></div>
		</div>

        <nav class="nav-products">
            <a href="#new" data-filter=".new" class="active">New arrivals</a>
            <a href="#sale" data-filter=".sale">Sale</a>
            <a href="#discount" data-filter=".discount" class="omega">50% off</a>
        </nav>
		
	</header>



	<div id="products-showcase" class="products-showcase grid-view">
		<?php for ($i=1; $i <= 4; $i++) { ?><div class="item item-col-4">
            <div class="item-wrap property-item">

                <h2 class="property-keyword"><a>Apartment for rent in Phaholyothin Bangkok</a></h2>

                <figure class="item-image">
                    <a href="#" class="hover-effect">
                        <img src="<?=IMAGES?>demo/06_385x258.jpg" alt="thumb">
                    </a>

                    <div class="property-lease">For Sale</div>

                    <div class="property-price price">
                        <p class="price-start">Start from</p>
                        <h3>350,000 THB</h3>
                        <p class="rant">21,000/mo THB</p>
                    </div>
                </figure>
                <!-- item-thumb --> 
                    
                <div class="property-sold"></div>   

                <div class="item-body">
                        
                    <h2 class="property-title"><a class="keyword"><span>Apartment for rent in Phaholyothin Bangkok</span><i class="icon-caret-right mlm"></i></a><a href="#" class="name">Apartment Oceanview</a></h2>
                    
                    <h3 class="property-code">
                        <span class="label">CODE :</span> <a href="#">HSPSU0024</a>
                        <div class="rating property-rating ui-star">
                            <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><span class="ratingCountVal" itemprop="ratingCount">15 Ratings</span>
                        </div>
                    </h3>
                            
                    <h4 class="property-salepoint">Single house in private gated community near Bangkok Patana School. Excellent community for families. Shopping mall, golf course. Very popular among the British families.</h4>
                    
                    <div class="property-amenities">
                        <p>
                            <span>Beds: 3</span>
                            <span>Baths: 2</span>
                            <span>Sqft: 1,965</span>
                        </p>
                        <!-- <p>Single Family Home</p> -->
                    </div>

                    <div class="item-more property-actions"><a class="btn btn-primary"><span class="btn-text">Details</span><i class="icon-angle-right mls"></i></a></div>

                </div>
                <!-- end: item-body -->
            
            </div>
        </div><?php } ?>
	</div>
</div></section>