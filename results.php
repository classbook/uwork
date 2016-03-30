<?php 
	include "./partials/init.php";
	ob_start();
?>


<?php
	
	$conditions = "true";
	
	$filters = array();
	
	if (isset($_GET["search"])){
		if ($_GET["search"]=="buy"){
			$conditions = "(for_sale=TRUE) ";
		}
		else{
			$conditions = "(for_rent=TRUE) ";
		}
		$equals = isset($_GET["equals"])?$_GET["equals"]:array();
		$greater = isset($_GET["greaterthan"])?$_GET["greaterthan"]:array();
		$lessthan =isset($_GET["lessthan"])?$_GET["lessthan"]:array();
		
		
		$neighbors = isset($_GET["neighbor"])?$_GET["neighbor"]:array();
		
		$mapping = array();

		foreach ($equals as $key => $value) {
			if (trim($value)==""){
				continue;
			}
			array_push($filters, $key);
			$key = str_replace("'", "", $key);
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='default'){
				continue;
			}
			$str = "($key='$value')";
			array_push($mapping, $str);
		}
		foreach ($greater as $key => $value) {
			if (trim($value)==""){
				continue;
			}
			array_push($filters, $key);
			$key = str_replace("'", "", $key);
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='default'){
				continue;
			}
			$str = "($key>='$value')";
			array_push($mapping, $str);
		}
		foreach ($lessthan as $key => $value) {
			if (trim($value)==""){
				continue;
			}
			array_push($filters, $key);
			$key = str_replace("'", "", $key);
			$value = htmlentities(mysql_escape_string($value));
			if ($value=='default'){
				continue;
			}
			$str = "($key<='$value')";
			array_push($mapping, $str);
		}
		
		$neighbors_tuple = "(";
		$neighborhood_start = true;
		foreach ($neighbors as $value) {
			$value = htmlentities(mysql_escape_string($value));
			if (!$neighborhood_start)
				$neighbors_tuple .= ",";
			$neighborhood_start = false;
			$neighbors_tuple .= $value;
		}
		$neighbors_tuple .= ")";
		if (!$neighborhood_start)
			array_push($mapping, "(neighborhood in $neighbors_tuple)");
		
		echo $neighbors_tuple;
		
		foreach ($mapping as $value) {
			$conditions .= " and ";
			$conditions .= $value;
		}
	}
	if ($conditions == "true")
		$conditions = "true";

	
$query = mysql_query("select * from neighborhood");
$query_neighbors = array();
while ($row = mysql_fetch_array($query)){
	$query_neighbors[ $row["id"]]= $row["name"];
}
?>
<style type="text/css">
	.filters .input_heading{
		text-align: right;
		float: none;
		font-weight: 900;
	}
	.filters select{
		display : none;
	}
	.searchrent_check, .searchrent_check ul{
		width : 100% !important;
		margin-top : 0px;
	}
	.searchrent_check ul li:first-child{
		width : 100% !important;
		white-space: nowrap !important;
	}
	.searchrent_check li{
		white-space: nowrap;
		width : 50% !important;
		list-style: none;
		text-align: left !important;
		float : left !important;
	}
</style>
<section class="page_mid"  >
	<div class="container" >
        <div class="page_pad" >
       
			
         <div classs="row">
       	       <div class="col-md-2">
				   <form method="GET" action="">
					   <input type="hidden" name="search" value="true"/>
                	<div class="sidebar">
						<ul class="filters">
                            <li><a href="#">Filters</a></li>
<div class="filter_field" style="position : relative;">
	<div class="suggestions container" id="neighborhood_change" style="padding-top : 20px;display : none;max-width: 600px;float: none; border:1px solid black;position : absolute; top : 0px; left: 110%;z-index: 100;background-color: white" onclick="event.stopPropagation(true);">

		
		
		
		
		
		
		
		
		
		
<?php
	$count = mysql_query("select count(*) from neighborhood_category");
	$count = mysql_fetch_array($count);
	$neighborhoodcategs = mysql_query("select * from neighborhood_category");
	$n_neighborhoodcateg = $count[0];
	
	$n_parsed = 0;
	for ($i=0; $i<($n_neighborhoodcateg/2); $i++) {
?>
			<div class="row">
			  <?php
			  for ($j=0; $j<2; $j++){
				  if ($n_parsed++ == $n_neighborhoodcateg)
					  break;
				  $neighborhoodcateg = mysql_fetch_array($neighborhoodcategs, MYSQL_ASSOC);
			  ?>
				<div class="col-md-6" style="">
            	<div class="rent_details_heading w_100">
                  <?php echo $neighborhoodcateg["name"];?>
                </div>
				<div class="searchrent_check">
					<ul>
						<li>
							<a href="#" class="check_all" style="width:auto;float: none;">Check All</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#" style="width : auto;float: none;" class="uncheck_all">Uncheck All</a>
						</li>
						<?php 
						$neighbours = mysql_query("select * from neighborhood where neighborhood_id=".$neighborhoodcateg["id"]);
						$ncount = mysql_query("select count(*) from neighborhood where neighborhood_id=".$neighborhoodcateg["id"]);
						$ncount = mysql_fetch_array($ncount)[0];
						for ($k=0; $k<  round($ncount/2); $k++){
							$neighborhood = mysql_fetch_array($neighbours, MYSQL_ASSOC);
						?>
						<li>
							<label style="font-weight: normal;display: block">
								<input type="checkbox" name="neighbor[]" 
									   value="<?php echo $neighborhood["id"];?>"
					<?php if (in_array($neighborhood["id"], $neighbors)!=FALSE)echo "checked='checked'";?>
								/> 
								&nbsp;<span><?php echo $neighborhood["name"];?></span>
							</label>
						</li>
						<?php }
						for ($k=  round($ncount/2); $k<$ncount; $k++){
							$neighborhood = mysql_fetch_array($neighbours, MYSQL_ASSOC);
						?>
						<li>
							<label style="font-weight: normal;display: block">
								<input type="checkbox" name="neighbor[]"
									   value="<?php echo $neighborhood["id"];?>"
					<?php if (in_array($neighborhood["id"], $neighbors))echo "checked='checked'";?>
/> 
								&nbsp;<span><?php echo $neighborhood["name"];?></span>
							</label>
						</li>
						<?php }?>
					</ul>
                </div>
            </div>
			  <?php }?>
          </div>
<?php }?>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	<div class="input_heading" onclick="$('#neighborhood_change').show();event.stopPropagation();">Neighborhood</div>
	<div id="neighborhood_list">
<?php
if ($neighborhood_start){
?>
<div style="text-align:right;">
	All
</div>

<?php
}

		foreach ($neighbors as $value) {
?>
<div style="text-align:right;">
	<?php echo $query_neighbors[$value];?>
</div>
<?php
		}
?>
</div>
</div>

	
	
	
	
	
<?php
	$select_arrays = array(
		"bedroom" => "Bedrooms",
		"partbath" => "Part Bath",
		"fullbath" => "Full Bath",
		"service_level" => "Service Level",
		"access" => "Access",
		"walls_allowed" => "Walls Allowed",
		"pet_policy" => "Pet Policy",
		"diplomats" => "Diplomats"
	);
	foreach ($select_arrays as $key => $value) {
?>
<div class="filter_field">
	<div class="input_heading"><?php echo $value;?></div>
	<div style="text-align:right;" class="input_value">
		<?php echo isset($_GET["equals"]["$key"])?
domains::$select_domains["$key"][$_GET["equals"]["$key"]]:"None";
		?>
	</div>
	<select class="searchrent_select2 w_100" name="equals[<?php echo $key;?>]">
<?php foreach (domains::$select_domains["$key"] as $key => $value) {?>
		<option value="<?php echo $key;?>" <?php
if (isset($_GET["equals"]["$key"]) && $_GET["equals"]["$key"]==$key)echo "selected='selected'";?>>
<?php echo $value;?>
</option>
<?php }?>
	</select>
</div>
	<?php }?>
                                <?php
								$features = array();
								foreach (domains::$checkboxes["apartment_features"] as $key => $value) {
									$features[$key] = $value;
								}
								foreach (domains::$checkboxes["building_features"] as $key => $value) {
									$features[$key] = $value;
								}
								foreach ($features as $key=>$value) {
								?>
								<label style="display : block;float:right;clear:both;margin-top: 6px;">
									<?php echo $value;?>
									<input type="checkbox" 
									<?php if (isset($_GET["equals"]["$key"]))echo "checked='checked'";?>
										   value="TRUE" name="equals[<?php echo $key;?>]"/>
								</label>
								<?php
								}
								?>
					   <div style="float:right; margin-top : 10px;clear:both;">
					   <input type="submit" value="Apply Filter" class="button_search" style="width:auto;"/>
					   </div>
                        </ul>
					</form>
                    </div>
                </div>
			 
                <div class="col-md-10" style="margin-top:25px; z-index: 0;">
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
<script type="text/javascript">
	$(".filter_field").each(function(){
		var that = this;
		$(".input_value", this).click(function(){
			$("select", that).show();
			$(this).hide();
		});
	});
	$(document).ready(function(){
		$(".searchrent_check").each(function(i){
			var th = this;
			$(".check_all", th).click(function(e){
				$("input[type='checkbox']", th).prop("checked", true);
				e.preventDefault();
				$(".uncheck_all", th).css("font-weight", "normal");
			})
			
			$(".uncheck_all", th).click(function(e){
				$("input[type='checkbox']", th).prop("checked", false);
				e.preventDefault();
				$(".check_all", th).css("font-weight", "normal");
			})
			$("input[type='checkbox']", th).change(function(){
				$("#neighborhood_list").html("");
				$("label", th).each(function(){
					var that = this;
					$("input:checked", this).each(function(){
						var div = $("<div style='text-align : right;'>"+$("span", that).innerHTML()+"</div>");
						$("#neighborhood_list").append(div);
					})
				});
			});
		});
		$(document.body).click(function(){
			$("#neighborhood_change").hide();
		})
	});
</script>
<?php 
	$content = ob_get_clean();
	include 'partials/container.php';
?>