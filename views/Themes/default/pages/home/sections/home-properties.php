<div class="module container" id="home-properties">

    <div class="module-header">
    	<h2>Properties for Rent</h2>
        <p>We have over 4,000 properties and over 20 years of experiance Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
    </div>
    <div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
        <ul class="tabs-nav ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist">
            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#tabs-1" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Featured</a></li>
            <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="true" aria-expanded="true"><a href="#tabs-2" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Most Recent</a></li>
            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Pet Friendly</a></li>
            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#tabs-4" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Near Schools</a></li>
            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#tabs-5" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Embassy Approved</a></li>
        </ul>
    
    </div>

    <div class="inner">
    	<div class="row clearfix">
    		<?php for ($i=0; $i < 3; $i++) { ?>
    	<div class="span4">
    		<div class="item">
                <div class="item-wrap">
                    <div class="property-item item-grid">
                        <div class="figure-block">
                            <figure class="item-thumb">
                                <div class="label-wrap hide-on-list">
                                    <div class="label-status label label-default">For Rent</div>
                                </div>
                                <span class="label-featured label label-success">Featured</span>
                                <div class="price hide-on-list">
                                    <h3>$350,000</h3>
                                    <p class="rant">$21,000/mo</p>
                                </div>
                                <a href="#" class="hover-effect">
                                    <img src="<?=IMAGES?>demo/06_385x258.jpg" alt="thumb">
                                </a>
                                <ul class="actions">
                                    <li class="share-btn">
                                        <div class="share_tooltip fade">
                                            <a href="#" target="_blank"><i class="icon-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="icon-google-plus"></i></a>
                                            <a href="#" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                        <span data-toggle="tooltip" data-placement="top" title="" data-original-title="share"><i class="icon-share-alt"></i></span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Favorite">
                                            <i class="icon-heart-o"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Photos (12)">
                                            <i class="icon-camera"></i>
                                        </span>
                                    </li>
                                </ul>
                            </figure>
                        </div>
                        <div class="item-body">

                            <div class="body-left">
                                <div class="info-row">
                                    <div class="rating">
                                        <span class="bottom-ratings"><span class="icon-star-o"></span><span class="icon-star-o"></span><span class="icon-star-o"></span><span class="icon-star-o"></span><span class="icon-star-o"></span><span style="width: 55%" class="top-ratings"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></span></span>
                                        <span class="star-text-right">15 Ratings</span>
                                    </div>

                                    <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                    <h3 class="property-code"><a href="#">CODE : HSPSU0024</a></h3>

                                    <h4 class="property-location">Single house in private gated community near Bangkok Patana School. Excellent community for families. Shopping mall, golf course. Very popular among the British families.</h4>
                                </div>
                                <div class="table-list full-width info-row">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p>
                                                <span>Beds: 3</span>
                                                <span>Baths: 2</span>
                                                <span>Sqft: 1,965</span>
                                            </p>
                                            <p>Single Family Home</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone">
                                            <a href="#" class="btn btn-primary">Details <i class="icon-angle-right fa-right"></i></a>
                                            <!-- <p><a href="#">+1 (786) 225-0199</a></p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

            </div>
            </div>
           <?php } ?>
    	</div>
    </div>

</div>