<?php 
	include "./partials/init.php";
	ob_start();
	
	$featured = mysql_query("select * from sitsolut_avi.featured_project");
?>
<style type="text/css">
.mcontainer {
    height: 18em;
    margin: 1em auto;
    overflow: hidden;
    background: white;
    position: relative;
    box-sizing: border-box;
}

.marquee {
    top: 6em;
    position: relative;
    box-sizing: border-box;
    animation: marquee 2s linear infinite;
}

.marquee:hover {
    animation-play-state: paused;
}

/* Make it move! */
@keyframes marquee {
    0%   { top:   8em }
    100% { top: -11em }
}

/* Make it look pretty */
.microsoft .marquee {
	margin: 0;
    padding: 0 1em;
    line-height: 1.5em;
    font: 1em 'Segoe UI', Tahoma, Helvetica, Sans-Serif;
}

.microsoft:before, .microsoft::before,
.microsoft:after,  .microsoft::after {
    left: 0;
    z-index: 1;
    content: '';
    position: absolute;
    pointer-events: none;
    width: 100%; height: 2em;
    background-image: linear-gradient(180deg, #FFF, rgba(255,255,255,0));
}

.microsoft:after, .microsoft::after {
    bottom: 0;
    transform: rotate(180deg);
}

.microsoft:before, .microsoft::before {
    top: 0;
}
</style>

<div class="divider_bar hgt_5" ></div><section class="page_mid"  >
    <div class="container" >
        <div class="page_pad" >
            <div class="row" >

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                    <div class="row" >
						<?php 
						$count=0;
						while (($row = mysql_fetch_array($featured, MYSQL_ASSOC)) && ($count++<4)){
						?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <div class="gallery" >
                                <img src="thumbs/featured_<?php echo $row["id"];?>.jpeg" >
                                <span><?php echo $row["title"];?></span> <br >
                                <span><?php echo $row["subtitle"];?></span>
                            </div>
                        </div>
						<?php }?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                    <h3>Quick Search</h3>
                    <div class="quick_search" >
                        <ul style=" background:#000;padding-top:10px">
                            <li>Rent From</li><li><select ><option>Select</option><option>...</option ><option>...</option ><option>...</option ></select></li>
                            <li>To</li><li><select ><option>Select</option><option>...</option ><option>...</option ><option>...</option ></select></li>
                        </ul>
                        <ul style=" background:#000;padding-bottom:10px">
                            <li>Bedroom</li><li><select ><option>Select</option><option>...</option ><option>...</option ><option>...</option ></select></li>
                            <li>Area</li><li><select ><option>Select</option><option>...</option ><option>...</option ><option>...</option ></select></li>
                        </ul>
                        <ul>
                            <li class="hidden-xs">&nbsp;</li><li class="hidden-xs">&nbsp;</li><li class="hidden-xs">&nbsp;</li><li style="padding-right:0px"><input type="button" class="button_search" value="search &nbsp;>>" ></li>
                        </ul>
                    </div>

                    <h3>Hot Listings</h3>
					<div>
						<div class="hot_listings" >
							<div class="listing_image" ><img src="http://localhost/img/01t.png" ></div>
							<div class="listing_name" >Telica <br >Two bedroom | @40,000 $<br ><a href="#">View Listing</a> | <a href="#">Watch Video</a></div>
						</div>
						<div class="hot_listings" >
							<div class="listing_image" ><img src="http://localhost/img/01t.png" ></div>
							<div class="listing_name" >Telica <br >Two bedroom | @40,000 $<br ><a href="#">View Listing</a> | <a href="#">Watch Video</a></div>
						</div>
						<div class="hot_listings" >
							<div class="listing_image" ><img src="http://localhost/img/01t.png" ></div>
							<div class="listing_name" >Telica <br >Two bedroom | @40,000 $<br ><a href="#">View Listing</a> | <a href="#">Watch Video</a></div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	$content = ob_get_clean();
	include './partials/container.php';
?>