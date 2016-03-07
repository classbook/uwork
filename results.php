<?php 
	include "./partials/init.php";
	ob_start();
?>


<?php
	
	$conditions = "";
	if (isset($_POST["search"])){
		$equals = $_POST["equals"];
		$greater = $_POST["greaterthan"];
		$lessthan = $_POST["lessthan"];
		
		
		$neighbors = isset($_POST["neighbor"])?$_POST["neighbor"]:array();
		
		$mapping = array();
		foreach ($equals as $key => $value) {
			$key = htmlentities(mysql_escape_string($key));
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='$$impossible'){
				continue;
			}
			$str = "($key='$value')";
			array_push($mapping, $str);
		}
		foreach ($greater as $key => $value) {
			$key = htmlentities(mysql_escape_string($key));
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='$$impossible'){
				continue;
			}
			$str = "($key>='$value')";
			array_push($mapping, $str);
		}
		foreach ($lessthan as $key => $value) {
			$key = htmlentities(mysql_escape_string($key));
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='$$impossible'){
				continue;
			}
			$str = "($key<=$value)";
			array_push($mapping, $str);
		}
		
		$neighbors_tuple = "(";
		$start = true;
		foreach ($neighbors as $value) {
			$value = htmlentities(mysql_escape_string($value));
			if (!$start)
				$neighbors_tuple .= ",";
			$start = false;
			$neighbors_tuple .= $value;
		}
		$neighbors_tuple .= ")";
		if (!$start)
			array_push($mapping, "(neighborhood in $neighbors_tuple)");
		
		$conditions = "true";
		foreach ($mapping as $value) {
			$conditions .= " and ";
			$conditions .= $value;
		}
		if ($conditions == "true")
			$conditions = "false";
	}
	
?>
<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad" >
       
         <div classs="row">
       	       <div class="col-md-2">
                	<div class="sidebar">
                    	<ul>
                            <li><a href="#">(click to change)</a></li>
                        	<li><a href="#" class="active_red">AGENTS</a>
                            <a href="#">ALL AGENTS</a>
                            <a href="#">+NEW AGENTS</a>
                            </li>
                            <li><a href="#">BUILDINGS</a></li>
                             <li><a href="#">OFFICES</a></li>
                              <li><a href="#">ALERTS</a></li>
                               <li><a href="#">MANAGEMENT</a></li>
                                <li>
                                  <a href="#">BUILDINGS</a>
                                  <a href="#">COMPANIES</a>
                                </li>
                                <li><a href="#">TESTIMONIALS</a></li>
                                <li>
                                  <a href="#">MANAGE</a>
                                  <a href="#">WEBSITE</a>
                                </li>
                                 <li>
                                  <a href="#">CRAIGSLIST</a>
                                  <a href="#">MANAGEMENT</a>
                                </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="margin-top:25px">
                   <div class="row" style="margin-bottom:20px">
                	   <div class="col-md-9" style="font-size:14px;">
                	      <span class="uderline_link">3BR</span>
                          <span class="active_red">></span>
                          <span class="uderline_link">1,000-1,500</span>
                          <span class="active_red">></span>Down Town Village, East Village East Side ...
                       </div>
                       <div class="col-md-3">
                       		<input type="button" class="button_search " value="SAVE THIS SEARCH >>" />
                       </div>                      
                     </div>
					
					
<?php
	$apartments = mysql_query("select * from apartment where $conditions");
	$count = mysql_query("select count(*) from apartment where $conditions");
	$count = mysql_fetch_array($count)[0];
	if (!$count)
		$count=0;
	if ($count==0){
		$count=0;
		echo "No results found";
	}


	for($i=0; $i<$count; $i++)
	{
		$apartment = mysql_fetch_array($apartments, MYSQL_ASSOC);
?>
					<div class="row " style="margin-bottom: 20px;">
                      	<div class="col-md-2">
                        	<div class="image_div">
                            	<img src="thumbs/<?php echo $apartment["id"];?>_0.jpeg">
                            </div>
                        </div>
                        <div class="col-md-10">
                        	<div class="full_widthheading" id="clickdiv">
                                   <h2><?php echo $apartment["name"];?> - <?php echo $apartment["price"];?></h2>                                  
                              </div>
                               <div class="linedivider_red"> &nbsp; </div>
                              <div class="box_searchresult">
                                <div class="input_heading">INFO</div><br>
                                <?php echo $apartment["notes"]; ?> <br/>
                                Neighborhood : <?php $neighbor = mysql_fetch_array(mysql_query("select * from neighborhood where id=".$apartment["neighborhood"]), MYSQL_ASSOC); echo $neighbor["name"];?><br/>
								Neighborhood Category : <?php echo mysql_fetch_array(mysql_query("select * from neighborhood_category where id=".$neighbor["neighborhood_id"]), MYSQL_ASSOC)["name"];?>
                            </div>  
                            <div class="box_searchresult">
                                <div class="input_heading">FEATURES</div><br>
                                <?php 
								$features = array(
									"swimming_pool" => "Swimming Pool",
									"wifi" => "WiFi", 
									"doorman" => "DoorMan",
									"pets_allowed" => "Pets Allowed",
									"fitness_pool" => "Fitness Pool",
									"outdoor_spaces"=> "Outdoor Spaces");
								foreach ($apartment as $key=>$value) {
									if (array_key_exists($key, $features) && $apartment[$key]=='TRUE')
										echo $features[$key]."<br/>";
								}
								?>
                            </div> 
                            <div class="box_searchresult">
                                <div class="input_heading">CONATCT</div><br>
                                Mobile No : <?php echo $apartment["mob_phone"];?><br>
                                Adress : <?php echo $apartment["address"]; ?> <br/>
                            </div>                                    
                        </div>
                      </div>
<?php }?>
					</div>
			 <!--
                <div class="row">
					<div class="col-md-12">
						(1-6 of 11)&nbsp; < &nbsp; > &nbsp; >>
					</div>
				</div>
			 -->
          </div>
                
       </div>
    </div>
</section>

<?php 
	$content = ob_get_clean();
	include 'partials/container.php';
?>